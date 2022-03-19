<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'class_link',
        'course_id',
        'class_order'
    ];
}
