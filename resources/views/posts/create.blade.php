@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-4">
                <form action="/post" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
