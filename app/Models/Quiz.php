<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
public function questions() {
    return $this->hasMany(Question::class);
}
protected $fillable = [
        'course_id', 
        'module_number',
        'moduleName',   // new
        'title',     
        'description',
        'total_marks', 
        
    ];
     public function scopeByModule($query, $courseId, $moduleNumber)
    {
        return $query->where('course_id', $courseId)
                    ->where('module_number', $moduleNumber);
    }

}
