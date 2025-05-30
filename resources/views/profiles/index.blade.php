@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="default-avatar" class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{$user->username}}</h1>
                    <a href="/post/create" class="text-decoration-none">Add New Post</a>
                </div>
                <div class="d-flex">
                    <div style="padding-right: 48px">
                        <strong>{{$user->posts->count()}}</strong> Posts
                    </div>
                    <div style="padding-right: 48px">
                        <strong>23K</strong> Followers
                    </div>
                    <div style="padding-right: 48px">
                        <strong>212</strong> Following
                    </div>
                </div>
                <div class="pt-4">
                    {{$user->profile->bio}}
                </div>
                <div>
                    <a href="#">{{$user->profile->url ?? 'N/A'}}</a>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <img src="/storage/{{$post->image}}" alt="" class="w-100">
                </div>
            @endforeach
        </div>
    </div>
@endsection
