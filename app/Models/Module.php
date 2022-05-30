<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','course_id','module_order'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function class(): HasMany
    {
        return $this->hasMany(ClassCourse::class);
    }

    public function quiz():HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
