<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_photo',
        'position',
        'company',
        'content',
        'rating',
        'status'
    ];

    protected $casts = [
        'rating' => 'integer'
    ];

    public function getRatingStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }
}