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
                    <a href="#" class="text-decoration-none">Add New Post</a>
                </div>
                <div class="d-flex">
                    <div style="padding-right: 48px">
                        <strong>153</strong> Posts
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
            <div class="col-4">
                <img src="https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop" alt="" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://images.unsplash.com/photo-1515023115689-589c33041d3c?w=500&h=500&fit=crop"  alt="" class="w-100">
            </div>
            <div class="col-4">
                <img src="https://images.unsplash.com/photo-1502630859934-b3b41d18206c?w=500&h=500&fit=crop"  alt="" class="w-100">
            </div>
        </div>
    </div>
@endsection
