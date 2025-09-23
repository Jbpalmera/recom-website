<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
    
        'first_name',
        'middle_initial',
        'last_name',
        'name_extension',
        'gender',
        'age_group',
        'civil_status',
        'nationality',
        'highest_educational_background',
        'sector_group',
        'senior_citizen',
        'differently_abled',
        'solo_parent',
        'region',
        'province',
        'city_municipality',
        'agency',
        'office_affiliation',
        'designation',
        'username',   // ✅ add this
        'email',
        'password',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['last_login_at'];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
