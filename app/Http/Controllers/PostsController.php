<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    // All routes in this controller require auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following->pluck('user_id'); // pluck() returns a single column
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(1); 
        // latest() = orderBy('created_at', 'DESC'); paginate gives you a number of pages
        return view('posts/index', compact('posts'));
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
        
        // Fit image using external library Intervention
        $image = Image::make(public_path("storage/{$imagePath}"))
            ->fit(1200, 1200)
            ->save();

        // Gets the authenticated user to create a post with their id
        Post::create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'title' => '',
        ]);

        return redirect('/profiles/' . request()->user()->id);
    }

    // Use route-model binding to return found post
    public function show(\App\Models\Post $post) {
        return view('posts/show', compact('post')); 

        // compact(var1, var2, ...) function returns an array of key value pairs following 
        // the pattern ['var1' => $var1, 'var2', => $var2]
    }
}
