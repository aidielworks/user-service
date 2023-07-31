<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response('test');
    }

    public function getUserGenres(Request $request, int $user_id)
    {
        $user = User::with('genres')->find($user_id);
        return response($user);
    }
}
