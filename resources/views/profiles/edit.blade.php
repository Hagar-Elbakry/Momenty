@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-4">
                <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="bio" class="col-md-4 col-form-label">Bio</label>
                        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->profile->bio }}"  autocomplete="bio" autofocus>

                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="url" class="col-md-4 col-form-label">URL</label>
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}"  autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
