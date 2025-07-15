<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resource;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'image',
        'title',
        'description',
        'category',
        'video_count',
        'approx_video_length',
        'total_duration',
        'price'
    ];
    
  public function enrollments()
{
    return $this->hasMany(Enrollment::class, 'course_id');
}

 public function resources()
    {
    return $this->hasMany(Resource::class, 'courseId');
    }

    public function students()
{
    return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
}

}
