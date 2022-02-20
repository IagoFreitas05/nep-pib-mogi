<?php

use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Models\Course;

class CreateNewCourse
{
    public function create (array $input){
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'duration' => ['required']
        ])->validate();

        return Course::create([
            'name' => $input['name'],
            'duration' => $input['duration'],
            'description' => $input['description']
        ]);
    }
}
