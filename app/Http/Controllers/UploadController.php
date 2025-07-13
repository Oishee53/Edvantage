<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function initiateUpload(Request $request, $courseId, $moduleId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'filename' => 'required|string',
            'filesize' => 'required|integer|min:1',
            'total_chunks' => 'required|integer|min:1',
            'file_type' => 'required|string|in:video,pdf'
        ]);

        // Generate unique upload ID
        $uploadId = Str::uuid();
        
        // Create upload session
        $chunkUpload = ChunkUpload::create([
            'upload_id' => $uploadId,
            'course_id' => $courseId,
            'module_id' => $moduleId,
            'title' => $request->title,
            'original_filename' => $request->filename,
            'total_size' => $request->filesize,
            'total_chunks' => $request->total_chunks,
            'file_type' => $request->file_type,
            'uploaded_chunks' => 0,
            'status' => 'initiated'
        ]);

        // Create temporary directory for chunks
        $tempDir = 'temp/uploads/' . $uploadId;
        Storage::disk('local')->makeDirectory($tempDir);

        return response()->json([
            'upload_id' => $uploadId,
            'message' => 'Upload session initiated'
        ]);
    }

    public function uploadChunk(Request $request)
    {
        $request->validate([
            'upload_id' => 'required|string',
            'chunk_index' => 'required|integer|min:0',
            'chunk' => 'required|file'
        ]);

        $uploadId = $request->upload_id;
        $chunkIndex = $request->chunk_index;
        $chunk = $request->file('chunk');

        // Find upload session
        $chunkUpload = ChunkUpload::where('upload_id', $uploadId)->first();
        
        if (!$chunkUpload) {
            return response()->json(['error' => 'Upload session not found'], 404);
        }

        if ($chunkUpload->status === 'completed') {
            return response()->json(['error' => 'Upload already completed'], 400);
        }

        // Store chunk
        $tempDir = 'temp/uploads/' . $uploadId;
        $chunkPath = $tempDir . '/chunk_' . $chunkIndex;
        
        Storage::disk('local')->put($chunkPath, file_get_contents($chunk->getRealPath()));

        // Update uploaded chunks count
        $chunkUpload->increment('uploaded_chunks');
        
        // Track uploaded chunk indices
        $uploadedChunks = $chunkUpload->uploaded_chunk_indices ?? [];
        if (!in_array($chunkIndex, $uploadedChunks)) {
            $uploadedChunks[] = $chunkIndex;
            $chunkUpload->update(['uploaded_chunk_indices' => $uploadedChunks]);
        }

        $progress = ($chunkUpload->uploaded_chunks / $chunkUpload->total_chunks) * 100;

        return response()->json([
            'message' => 'Chunk uploaded successfully',
            'progress' => round($progress, 2),
            'uploaded_chunks' => $chunkUpload->uploaded_chunks,
            'total_chunks' => $chunkUpload->total_chunks
        ]);
    }

    public function completeUpload(Request $request)
    {
        $request->validate([
            'upload_id' => 'required|string'
        ]);

        $uploadId = $request->upload_id;
        $chunkUpload = ChunkUpload::where('upload_id', $uploadId)->first();

        if (!$chunkUpload) {
            return response()->json(['error' => 'Upload session not found'], 404);
        }

        if ($chunkUpload->uploaded_chunks !== $chunkUpload->total_chunks) {
            return response()->json([
                'error' => 'Not all chunks uploaded',
                'uploaded' => $chunkUpload->uploaded_chunks,
                'total' => $chunkUpload->total_chunks
            ], 400);
        }

        try {
            // Merge chunks
            $finalFilePath = $this->mergeChunks($chunkUpload);
            
            // Update or create resource record
            $this->updateResourceRecord($chunkUpload, $finalFilePath);
            
            // Update upload status
            $chunkUpload->update([
                'status' => 'completed',
                'final_path' => $finalFilePath
            ]);

            // Clean up temporary files
            $this->cleanupTempFiles($uploadId);

            return response()->json([
                'message' => 'File uploaded successfully',
                'file_path' => $finalFilePath
            ]);

        } catch (\Exception $e) {
            $chunkUpload->update(['status' => 'failed']);
            
            return response()->json([
                'error' => 'Failed to complete upload: ' . $e->getMessage()
            ], 500);
        }
    }

    private function updateResourceRecord($chunkUpload, $finalFilePath)
    {
        // Find existing resource for this course and module
        $resource = Resource::where('courseId', $chunkUpload->course_id)
                          ->where('moduleId', $chunkUpload->module_id)
                          ->first();

        if (!$resource) {
            // Create new resource record
            $resource = new Resource();
            $resource->courseId = $chunkUpload->course_id;
            $resource->moduleId = $chunkUpload->module_id;
        }

        // Update the appropriate field based on file type
        if ($chunkUpload->file_type === 'video') {
            // Store as JSON array to support multiple videos
            $videos = $resource->videos ? json_decode($resource->videos, true) : [];
            $videos[] = [
                'title' => $chunkUpload->title,
                'filename' => $chunkUpload->original_filename,
                'path' => $finalFilePath,
                'size' => $chunkUpload->total_size,
                'uploaded_at' => now()->toISOString()
            ];
            $resource->videos = json_encode($videos);
        } else {
            // Store as JSON array to support multiple PDFs
            $pdfs = $resource->pdf ? json_decode($resource->pdf, true) : [];
            $pdfs[] = [
                'title' => $chunkUpload->title,
                'filename' => $chunkUpload->original_filename,
                'path' => $finalFilePath,
                'size' => $chunkUpload->total_size,
                'uploaded_at' => now()->toISOString()
            ];
            $resource->pdf = json_encode($pdfs);
        }

        $resource->save();
    }

    private function mergeChunks(ChunkUpload $chunkUpload)
    {
        $uploadId = $chunkUpload->upload_id;
        $tempDir = 'temp/uploads/' . $uploadId;
        
        // Generate final file path
        $extension = pathinfo($chunkUpload->original_filename, PATHINFO_EXTENSION);
        $filename = time() . '_' . Str::random(10) . '.' . $extension;
        $finalPath = 'course_' . $chunkUpload->course_id . '/module_' . $chunkUpload->module_id . '/' . $filename;
        
        // Create directory if it doesn't exist
        Storage::disk('courses')->makeDirectory('course_' . $chunkUpload->course_id . '/module_' . $chunkUpload->module_id);
        
        // Merge chunks in order
        $finalFilePath = storage_path('app/courses/' . $finalPath);
        $finalFile = fopen($finalFilePath, 'wb');
        
        if (!$finalFile) {
            throw new \Exception('Could not create final file');
        }

        for ($i = 0; $i < $chunkUpload->total_chunks; $i++) {
            $chunkPath = storage_path('app/' . $tempDir . '/chunk_' . $i);
            
            if (!file_exists($chunkPath)) {
                fclose($finalFile);
                throw new \Exception("Chunk $i is missing");
            }
            
            $chunkData = file_get_contents($chunkPath);
            fwrite($finalFile, $chunkData);
        }
        
        fclose($finalFile);
        
        // Verify file size
        if (filesize($finalFilePath) !== $chunkUpload->total_size) {
            unlink($finalFilePath);
            throw new \Exception('File size mismatch after merge');
        }
        
        return $finalPath;
    }

    private function cleanupTempFiles($uploadId)
    {
        $tempDir = 'temp/uploads/' . $uploadId;
        Storage::disk('local')->deleteDirectory($tempDir);
    }

    public function downloadResource(Request $request, $courseId, $moduleId, $type, $index)
    {
        $resource = Resource::where('courseId', $courseId)
                          ->where('moduleId', $moduleId)
                          ->first();

        if (!$resource) {
            abort(404, 'Resource not found');
        }

        $files = [];
        if ($type === 'video' && $resource->videos) {
            $files = json_decode($resource->videos, true);
        } elseif ($type === 'pdf' && $resource->pdf) {
            $files = json_decode($resource->pdf, true);
        }

        if (!isset($files[$index])) {
            abort(404, 'File not found');
        }

        $file = $files[$index];
        $filePath = storage_path('app/courses/' . $file['path']);

        if (!file_exists($filePath)) {
            abort(404, 'File not found on disk');
        }

        return response()->download($filePath, $file['filename']);
    }

    public function streamVideo(Request $request, $courseId, $moduleId, $index)
    {
        $resource = Resource::where('courseId', $courseId)
                          ->where('moduleId', $moduleId)
                          ->first();

        if (!$resource || !$resource->videos) {
            abort(404, 'Video not found');
        }

        $videos = json_decode($resource->videos, true);
        if (!isset($videos[$index])) {
            abort(404, 'Video not found');
        }

        $video = $videos[$index];
        $filePath = storage_path('app/courses/' . $video['path']);

        if (!file_exists($filePath)) {
            abort(404, 'Video file not found');
        }

        return response()->file($filePath, [
            'Content-Type' => 'video/mp4',
            'Accept-Ranges' => 'bytes'
        ]);
    }

    public function deleteResource(Request $request, $courseId, $moduleId, $type, $index)
    {
        $resource = Resource::where('courseId', $courseId)
                          ->where('moduleId', $moduleId)
                          ->first();

        if (!$resource) {
            return response()->json(['error' => 'Resource not found'], 404);
        }

        $files = [];
        if ($type === 'video' && $resource->videos) {
            $files = json_decode($resource->videos, true);
        } elseif ($type === 'pdf' && $resource->pdf) {
            $files = json_decode($resource->pdf, true);
        }

        if (!isset($files[$index])) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $file = $files[$index];
        
        // Delete physical file
        $filePath = storage_path('app/courses/' . $file['path']);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Remove from array
        unset($files[$index]);
        $files = array_values($files); // Re-index array

        // Update database
        if ($type === 'video') {
            $resource->videos = empty($files) ? null : json_encode($files);
        } else {
            $resource->pdf = empty($files) ? null : json_encode($files);
        }
        
        $resource->save();

        return response()->json(['message' => 'File deleted successfully']);
    }
}
