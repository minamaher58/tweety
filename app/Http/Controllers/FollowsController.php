<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        // follow the given user
//        auth()->user()->follow($user);

        auth()->user()->toggleFollow($user);
        return back();
    }
}
