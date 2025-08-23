<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'user_id',
        'area_of_expertise',
        'qualification',
        'video_editing_skill',
        'target_audience',
        'bio',
        'profile_image',
        'card_type',
        'card_holder_name',
        'card_number',
        'expiry_date',
        'cvv',
        'bank_name',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
