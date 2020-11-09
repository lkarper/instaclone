<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

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
        $data['title'] = '';
        $imagePath = request('image')->store('uploads', 'public');
        dd($imagePath);
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'title' => '',
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }
}
