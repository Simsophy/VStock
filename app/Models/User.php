<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\SoftDeletes; // Only if using soft deletes

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // use SoftDeletes; // Only if using soft deletes

    /**
     * The attributes that are mass assignable.
     *
     * You MUST ensure 'password' is here.
     * The 'uuid' field should also be fillable if you set it manually.
     * If you have other fields like 'is_admin', they should also be listed.
     */
    protected $fillable = [
        'name',
        'email',
        'password', // <--- MAKE SURE THIS IS PRESENT
        'uuid',     // <--- MAKE SURE THIS IS PRESENT IF YOU SET IT MANUALLY
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // This is often used now, but 'bcrypt' in controller is fine too.
    ];
    
    // ... add boot method here if you need to fix the deletion issue (Foreign Key)
}
