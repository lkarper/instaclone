<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(User $user) {
        return auth()->user()->following()->toggle($user->profile);
        // toggle() is used to add or remove, based on whether the data exists in table; great for follow/unfollow!
    }
}
