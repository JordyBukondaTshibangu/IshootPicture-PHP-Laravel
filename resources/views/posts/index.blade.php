@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-start mx-5">
                <button class="btn btn-info">
                    <a href="/posts/create" class="text-light text-decoration-none px-5">Add Post</a>
                </button>
            </div>
            <div class="d-flex justify-content-end mx-5">
                <button class="btn btn-primary">
                    <a href="/profile/{{$user}}" class="text-light px-5 text-decoration-none">View my profil</a>
                </button>
            </div>
        </div>
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{$post->user->id }}">
                        <img src="/storage/{{$post->image}}" alt="img" class="w-100">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3 pt-2 pb-4">
                    <p>
                        <a href="/profile/{{$post->user->id}}" class="text-dark pr-5"> {{ $post->user->username }}</a>
                        {{$post->caption}}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center ">
            {{ $posts->links()}}
        </div>
    </div>
    </div>
@endsection
