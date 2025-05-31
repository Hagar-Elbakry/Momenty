@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-8">
               <img src="/storage/{{$post->image}}" alt="" class="w-100">
           </div>
           <div class="col-4">
               <div>
                   <div class="d-flex align-items-center">
                       <div style="padding-right: 15px">
                           <img src="/storage/{{$post->user->profile->image}}" alt="" class="rounded-circle w-100" style="max-width: 40px">
                       </div>
                       <div>
                           <div style="font-weight: bold">
                               <a class="text-decoration-none" href="/profile/{{$post->user->id}}">
                                   <span class="text-dark">{{$post->user->username}}</span>
                               </a>
                               <a class="text-decoration-none" style="padding-left: 15px" href="#">Follow</a>
                           </div>
                       </div>
                   </div>

                   <hr>

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
    </div>
@endsection
