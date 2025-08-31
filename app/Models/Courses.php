<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resource;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\User;

class Courses extends Model
{
    protected $table = 'courses';

    // Updated fillable fields
    protected $fillable = [
        'image',
        'title',
        'description',
        'category',
        'module',       // new
        'price',
        'status',       // new
        'instructor_id'
    ];

    /**
     * A course has many resources
     */
    public function resources()
    {
        return $this->hasMany(Resource::class, 'courseId', 'id');
    }

    /**
     * A course belongs to many students
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }

    /**
     * A course has many enrollments
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }

    /**
     * A course has many quizzes
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_id', 'id');
    }

    /**
     * A course belongs to an instructor
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * Delete related resources and enrollments when a course is deleted
     */
    protected static function booted()
    {
        static::deleting(function ($course) {
            $course->resources()->delete();
            $course->enrollments()->delete(); // optional
        });
    }
}
