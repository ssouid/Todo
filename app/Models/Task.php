<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'due_date',
        'priority',
        'status',
        'created_by'

    ];

    public function users(){

        return $this-> belongsToMany(User::class)->withTimestamps(); 
    }

    public function createdby(){

        return $this-> belongsTo(User::class,'created_by')->withTimestamps(); 
    }

    public function categories(){

        return $this-> belongsToMany(Category::class)->withTimestamps(); 
    }
}
