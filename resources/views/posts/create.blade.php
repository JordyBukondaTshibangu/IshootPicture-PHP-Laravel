@extends('layouts.app')

@section('content')
<form action="/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Image Caption</label>
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
                    @error('caption')
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
                <button class="btn btn-primary ">Add New Post</button>
            </div>
        </div>
    </div>
</form>
@endsection
