@extends('layouts.app')

@section('content')
<form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container">
        <div class="row">
            <title> Edit Profile </title>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                    <input  id="title" type="text" 
                            class="form-control @error('title') is-invalid @enderror" 
                            name="title" value="{{ old('title') ?? $user->profil->title }}" 
                             autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <input  id="description" type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description" value="{{ old('description') ?? $user->profil->description }}" 
                            required autocomplete="description" autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>
                    <input  id="url" type="text" 
                            class="form-control @error('url') is-invalid @enderror" 
                            name="url" value="{{ old('url') ?? $user->profil->url}}" 
                            required autocomplete="url" autofocus>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-8 offset-2">
                <button class="btn btn-primary ">Edit Profil</button>
                <button class="btn btn-primary ">
                    <a href="/profile/{{$user->id}}" class="text-light text-decoration-none">Cancel</a>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
