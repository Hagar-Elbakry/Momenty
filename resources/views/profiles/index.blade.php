@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{$user->profile->profileImage()}}" alt="default-avatar" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center" style="padding-bottom: 10px">
                        <div class="h4">{{$user->username}}</div>
                    @if(!auth()->check() || auth()->user()->id != $user->id)
                        <form action="/follow/{{$user->id}}" method="post">
                            @csrf
                                @if($follows)
                                    <button class="btn btn-primary" style="margin-left: 20px">Unfollow</button>
                                @else
                                    <button class="btn btn-primary" style="margin-left: 20px">Follow</button>
                                @endif
                        </form>
                    @endif
                    </div>

                    @can('update', $user->profile)
                        <a href="/post/create" class="text-decoration-none">Add New Post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <div class="d-flex">
                        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                        @if($user->profile->image)
                            <form id="delete-photo" action="/profile/{{$user->id}}/deletePhoto" method="post">
                                @csrf
                                @method('DELETE')
                                <a style="padding-left: 5px" href="/profile/{{$user->id}}/deletePhoto"
                                   onclick="event.preventDefault();
                                                         document.getElementById('delete-photo').submit();">
                                    Delete Photo
                                </a>
                            </form>
                    @endif
                    </div>
                @endcan
                <div class="d-flex">
                    <div style="padding-right: 48px">
                        <strong>{{$postsCount}}</strong> Posts
                    </div>
                    <div style="padding-right: 48px">
                        <strong>{{$followersCount}}</strong> Followers
                    </div>
                    <div style="padding-right: 48px">
                        <strong>{{$followingCount}}</strong> Following
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
            @forelse($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/post/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" alt="" class="w-100">
                    </a>
                    @can('delete', $post)
                        <form action="/post/{{$post->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" style="margin-left: 315px">Delete Post</button>
                        </form>
                    @endcan
                </div>
            @empty
                    <div class="d-flex justify-content-center">
                        <p style="font-weight: bold">No Posts Yet !</p>
                    </div>
            @endforelse
        </div>
    </div>
@endsection
