<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{

//    public function index()
//    {
//        return view('explore', [
//            'users' => User::simplePaginate(5),
//        ]);
//    }

    public function __invoke()
    {
        return view('explore', [
            'users' => User::simplePaginate(5),
        ]);
    }
}
