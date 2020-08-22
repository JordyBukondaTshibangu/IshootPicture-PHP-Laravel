@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" alt="img" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profil->userProfil()}}" alt="" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <a href="/profile/{{$post->user->id}}" class="text-dark pr-3"> {{ $post->user->username }}</a>
                        <a href="" class="btn btn-primary"> Follow</a>
                    </div>
                </div>
                <hr>
                <p>
                    <a href="/profile/{{$post->user->id}}" class="text-dark pr-5"> {{ $post->user->username }}</a>
                    {{$post->caption}}
                </p>
            </div>
        </div>
    </div>
@endsection
