<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['course_id','class_id','question','answer','user_id','username'];
    use HasFactory;
}
