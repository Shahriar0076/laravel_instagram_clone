@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h3>Edit Profile</h3>
                </div>

                <div class="form-group row">   
                <label for="" class="col-form-label col-md-4">Title</label>                                   
                    <input id="title" 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ old('title') ?? $user->profile->title }}"  
                    autocomplete="title" 
                    placeholder="Image title"
                    required
                    autofocus>
    
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="form-group row">   
                <label for="" class="col-form-label col-md-4">Description</label>                                   
                    <input id="description" 
                    type="text" 
                    class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                    value="{{ old('description') ?? $user->profile->description }}"  
                    autocomplete="description" 
                    placeholder="Image description"
                    required
                    autofocus>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="form-group row">   
                <label for="" class="col-form-label col-md-4">Url</label>                                   
                    <input id="url" 
                    type="text" 
                    class="form-control @error('url') is-invalid @enderror" 
                    name="url" 
                    value="{{ old('url') ?? $user->profile->url}}"  
                    autocomplete="url" 
                    placeholder="Image url"                    
                    autofocus>
    
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="row">
                    <label for="" class="col-form-label col-md-4">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image"  >
                    @error('image')
                        <strong>{{ $message }}</strong>                        
                    @enderror  
                </div>

                <div class="row mt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
              

            </div>
        </div>
    </form>
</div>
@endsection
