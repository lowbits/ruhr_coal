<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {

    }

    function show(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return view('user.index', ['user' => $user->load('activities', 'gactivities')]);

    }
}
