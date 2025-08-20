<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingCourses extends Model
{
    protected $table = 'pending_courses';

    // Since we’re manually generating IDs
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                // Get the latest ID starting with "P"
                $latestId = self::where('id', 'like', 'P%')
                    ->orderBy('id', 'desc')
                    ->value('id');

                // Extract number part
                $nextNumber = $latestId ? intval(substr($latestId, 1)) + 1 : 1;

                // Generate new ID with prefix "P" and 5-digit padding
                $model->id = 'P' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
            }
        });
    }

    protected $fillable = [
        'image',
        'title',
        'description',
        'category',
        'video_count',
        'approx_video_length',
        'total_duration',
        'price',
        'prerequisite',
        'instructor_id',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
