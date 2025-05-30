<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $attributes = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $attributes['image'] = $imagePath;
        auth()->user()->posts()->create($attributes);
        return redirect('/profile/'. auth()->user()->id);
    }
}
