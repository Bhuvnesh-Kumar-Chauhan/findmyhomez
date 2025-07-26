<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'bio',
        'social_links',
        'status'
    ];

    protected $casts = [
        'social_links' => 'array'
    ];

}