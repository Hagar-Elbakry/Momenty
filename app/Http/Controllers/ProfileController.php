<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user) {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);
        $attributes = request()->validate([
            'url' => 'url|nullable',
        ]);

        auth()->user()->profile()->update([
            'bio' => request('bio'),
            'url' => $attributes['url']
        ]);
        return redirect("profile/" . auth()->user()->id);
    }
}
