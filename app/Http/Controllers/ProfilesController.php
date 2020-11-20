<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user) {
        return view('profiles/index', compact('user'));
    }

    public function edit(User $user) {
        // validate that the user attempting to update a profile is the one who owns profile
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user) {
        // validate that the user attempting to update a profile is the one who owns profile
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('storage', 'public'); // store(directory, driver)
        // Run php artisan storage:link to create link to storage/app/public/storage
        
        // Fit image using external library Intervention
        $image = Image::make(public_path("storage/{$imagePath}"))
            ->fit(1000, 1000)
            ->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath],
        ));

        return redirect('/profiles/' . Auth::id());
    }
}
