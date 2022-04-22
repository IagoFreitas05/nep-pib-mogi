<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'duration',
        'description',
        'profile_photo_path'
    ];

    public function subscription(): HasMany{
       return $this->hasMany(Subscription::class);
    }

    public function classCourse(): HasMany{
      return  $this->hasMany(ClassCourse::class);
    }

    public function module(): HasMany{
        return $this->hasMany(Module::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

}
