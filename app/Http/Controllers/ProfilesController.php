<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user) {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember(
            'count.posts.' . $user->id, 
            now()->addSeconds(30),
            function () use ($user) { 
            return $user->posts->count();
        });
        $followersCount = Cache::remember(
            'count.followers.' . $user->id, 
            now()->addSeconds(30),
            function () use ($user) { 
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember(
            'count.following.' . $user->id, 
            now()->addSeconds(30),
            function () use ($user) { 
            return $user->following->count();
        });
        return view('profiles/index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
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
            
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],  // Empty array will not override data, this way your already saved image will not be deleted
        ));

        return redirect('/profiles/' . Auth::id());
    }
}
