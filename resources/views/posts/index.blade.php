@extends('layouts.app')

@section('content')
    <div class="container">
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
