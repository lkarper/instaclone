@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <legend>Add new post</legend>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <div class="col-md-6">
                        <input
                            id="caption"
                            type="text"
                            class="form-control @error('caption') is-invalid @enderror"
                            name="caption"
                            value="{{ old('caption') }}"
                            required
                            autofocus
                        >

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary pt-4">Add new post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
