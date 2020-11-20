@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profiles/{{ $user->id }}" enctype="multipart/form-data" method="post">
        {{-- Adds an authentication token to form --}}
        @csrf  
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <div class="col-md-6">
                        <input
                            id="title"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            value="{{ old('title') ?? $user->profile->title }}"
                            required
                            autofocus
                        >

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <div class="col-md-6">
                        <input
                            id="description"
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            value="{{ old('description') ?? $user->profile->description }}"
                            required
                            autofocus
                        >

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <div class="col-md-6">
                        <input
                            id="url"
                            type="text"
                            class="form-control @error('url') is-invalid @enderror"
                            name="url"
                            value="{{ old('url') ?? $user->profile->url }}"
                            required
                            autofocus
                        >

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                        <input 
                            type="file" 
                            class="form-control-file @error('image') is-invalid @enderror" 
                            id="image" 
                            name="image" 
                        >
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary pt-4">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
