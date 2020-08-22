@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <div><img src="{{$user->profil->userProfil()}}" alt="logo" class="rounded-circle w-100"></div>
        </div>
        <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline pt-3">
                    <div class="d-flex">
                        <h1>{{ $user->username }}</h1>
                    <button-follow user-id="{{$user->id}}" follows={{$follows}}></button-follow>
                    </div>

            @can('update', $user->profil)
                    <a href="/posts/create" class="btn btn-primary">Add Post</a>
            @endcan
                </div>
            @can('update', $user->profil)
                <a href="/profile/{{$user->id}}/edit"> Edit Profil</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"> <strong>{{$postsCount }}</strong> posts</div>
                <div class="pr-5"> <strong>{{$followersCount}}</strong> followers</div>
                <div class="pr-5"> <strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-3 font-weigth-bold"> {{ $user->profil->title}}</div>
            <div> {{ $user->profil->description ?? "not available" }} </div>
            <div>
                <a href="#">{{ $user->profil->url ?? "not available"}}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @if ($user->posts->count() >= 1)
            @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/posts/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" alt="img" class="w-100">
                </a>
            </div>
        @endforeach
        @else
            <h1>No Posts available... </h1>
        @endif
    </div>
</div>
@endsection
