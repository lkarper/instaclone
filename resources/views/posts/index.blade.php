@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/profiles/{{ $post->user->id }}"><img class="w-100" src="/storage/{{ $post->image }}" alt="{{ $post->caption }}"></a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
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
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
                {{-- links() calls the pages from the paginate() function in the controller --}}
            </div>
        </div>
    </div>
@endsection