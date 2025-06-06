<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->orwhere('user_id', auth()->user()->id)->with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
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
        $image = Image::read(public_path() . '/storage/' . $imagePath)->cover(1200,1200);
        $image->save();
        $attributes['image'] = $imagePath;
        auth()->user()->posts()->create($attributes);
        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(Post $post) {
        $follows = auth()->user() ? auth()->user()->following->contains($post->user->id) : false;
        return view('posts.show', compact('post' , 'follows'));
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        Storage::delete($post->image);
        $post->delete();
        return redirect()->back();
    }
}
