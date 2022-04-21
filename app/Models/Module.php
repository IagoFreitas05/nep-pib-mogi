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

    protected $fillable = ['name','description'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function class(): HasMany
    {
        return $this->hasMany(ClassCourse::class);
    }

    public function quiz():HasOne
    {
        return $this->hasOne(Quiz::class);
    }
}
