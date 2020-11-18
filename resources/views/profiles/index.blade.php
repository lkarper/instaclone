@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-9 pt-5">
           <div class="d-inline-flex justify-content-between align-items-baseline">
               <h1>{{ $user->username }}</h1>
               <a href="#">Add new post</a>
           </div>
           <div class="d-flex">
               <div class="pr-5"><strong>153</strong> posts</div>
               <div class="pr-5"><strong>23k</strong> followers</div>
               <div class="pr-5"><strong>212</strong> following</div>
           </div>
           <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
           <div>{{ $user->profile->description }}</div>
           <div><a href="#">{{ $user->profile->url }}</a></div>
       </div>
   </div>
    <div class="row pt-5">
        <div class="col-4">
            <img class="w-100" src="https://images.unsplash.com/photo-1580953870233-4c7f485628d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="Lorem ipsum">
        </div>
        <div class="col-4">
            <img class="w-100" src="https://images.unsplash.com/photo-1580953870233-4c7f485628d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="">
        </div>
        <div class="col-4">
            <img class="w-100" src="https://images.unsplash.com/photo-1580953870233-4c7f485628d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="">
        </div>
    </div>
</div>
@endsection
