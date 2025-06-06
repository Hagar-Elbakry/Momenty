@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{$post->user->id}}">
                         <img src="/storage/{{$post->image}}" alt="" class="w-100">
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <div>
                        <p>
                       <span style="font-weight: bold">
                           <a class="text-decoration-none" href="/profile/{{$post->user->id}}">
                               <span class="text-dark">{{$post->user->username}}</span>
                           </a>
                       </span>
                            {{$post->caption}}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center">
                <p style="font-weight: bold; padding-top: 300px">No Posts Yet !</p>
            </div>
        @endforelse
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
