<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    // All routes in this controller require auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('posts/create');
    }

    public function store() {
        
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public'); // store(directory, driver)
        // Run php artisan storage:link to create link to storage/app/public/uploads
        
        // Gets the authenticated user to create a post with their id
        Post::create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'title' => '',
        ]);

        return redirect('/profile/' . request()->user()->id);
    }
}
