<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'duration',
        'description',
        'profile_photo_path'
    ];

    public function subscription(){
       return $this->hasMany(Subscription::class);
    }

    public function classCourse(){
      return  $this->hasMany(ClassCourse::class);
    }
}
