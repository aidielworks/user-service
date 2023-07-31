<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function getUserInterest(Request $request, int $user_id)
    {
        $user = User::with('interests')->find($user_id);
        return response($user);
    }
}
