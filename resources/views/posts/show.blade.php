@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img class="w-100 rounded-circle" src="{{ $post->user->profile->profileImage() }}" alt="Profile avatar for {{ $post->user->username }}" style="max-width: 35px">
                        </div>
                        <div>
                            <p class="font-weight-bold">
                                <a href="/profiles/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                <a href="#" class="pl-3">Follow</a>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <span class="font-weight-bold">
                            <a href="/profiles/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection