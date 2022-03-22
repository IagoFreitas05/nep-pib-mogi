<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function create(Request $request){
        $sub = Subscription::create([
            'course_id' => $request->input('course_id'),
            'user_id' => Auth::user()->id,
            'status' => 'active'
        ]);

        /*renderizar a página de subscrições do inertia*/
    }
}
