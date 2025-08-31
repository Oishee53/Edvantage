<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';

    // Updated fillable fields
    protected $fillable = [
        'courseId',
        'moduleNumber',
        'moduleName',   // renamed
        'lectureNumber',
        'lectureName',  // new
        'videos',
        'pdf'
    ];

    /**
     * A resource belongs to a course
     */
    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseId');
    }
}