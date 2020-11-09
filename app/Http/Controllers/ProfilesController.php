<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user) {
        return view('profiles/index', [
            'user' => User::findOrFail($user), // findOrFail() fails gracefully
        ]);
    }
}
