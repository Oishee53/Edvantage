<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quiz() {
    return $this->belongsTo(Quiz::class);
}
public function options() {
    return $this->hasMany(Option::class);
}
protected $fillable = [
        'quiz_id',
        'question_text',
    ];
}
