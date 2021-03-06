<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedClass extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','user_id','course_id'];
}
