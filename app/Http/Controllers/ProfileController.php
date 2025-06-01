<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user) {
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows'));
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

        auth()->user()->profile()->update([
            'bio' => request('bio'),
            'url' => $attributes['url'],
            'image' => $attributes['image']
        ]);
        return redirect("profile/" . auth()->user()->id);
    }
}
