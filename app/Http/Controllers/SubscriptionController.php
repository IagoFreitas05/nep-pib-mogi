<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function create(Request $request): \Inertia\Response
    {
        Subscription::create([
            'course_id' => $request->input('course_id'),
            'user_id' => Auth::user()->id,
            'status' => true
        ]);

        return Inertia::render("Dashboard");
    }
}
