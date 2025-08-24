<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['course_id','user_id','score','comment'];

    public function course() { return $this->belongsTo(Courses::class, 'course_id'); }
    public function user()   { return $this->belongsTo(User::class, 'user_id'); }

    public function scopeForCourse($q, $courseId){ return $q->where('course_id',$courseId); }
    public function scopeForUser($q, $userId){ return $q->where('user_id',$userId); }
}
