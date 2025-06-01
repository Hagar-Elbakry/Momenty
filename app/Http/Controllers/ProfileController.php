<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user) {
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember('posts.count.' . $user->id , now()->addseconds(30), function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('followers.count.' . $user->id, now()->addseconds(30), function () use ($user) {
            return  $user->profile->followers->count();
        });

        $followingCount = Cache::remember('following.count.' . $user->id, now()->addseconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });


        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);
        $attributes = request()->validate([
            'url' => 'url|nullable',
            'image' => 'image|nullable',
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::read(public_path("storage/{$imagePath}"))->cover(1000,1000);
            $image->save();
            $attributes['image'] = $imagePath;
        }
        $attributes['bio'] = request('bio');
        auth()->user()->profile()->update($attributes);
        return redirect("profile/" . auth()->user()->id);
    }
}
