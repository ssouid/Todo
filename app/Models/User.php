<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'user_type',
        'password',
        'avatar',
        
       
    ];

       /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];


    public function tasks(){

        return $this-> belongsToMany(Task::class)->withTimestamps(); ;
    }

    public function createdTask(){

        return $this-> hasMany(Task::class,'created_by'); 
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function avatarUrl(){

        return $this->avatar

        ?  Storage::disk('avatars')->url($this->avatar)
        
        
        : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));

    }

  
}
