<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MusicHistoryController extends Controller
{
    public function show(Request $request, int $user_id)
    {
        $user = User::with('musicHistories.music')->find($user_id);
        return response($user);
    }
}
