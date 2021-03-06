<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'class_link',
        'course_id',
        'module_id',
        'class_order'
    ];

    public function course(): BelongsTo{
        return $this->belongsTo(Course::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
