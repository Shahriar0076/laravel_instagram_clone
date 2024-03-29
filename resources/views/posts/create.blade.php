@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h3>Add New Post</h3>
                </div>
                <div class="form-group row">                                      
                    <input id="caption" 
                    type="text" 
                    class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" 
                    value="{{ old('caption') }}"  
                    autocomplete="caption" 
                    placeholder="Image Caption"
                    required
                    autofocus>
    
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="row">
                    <label for="" class="col-form-label col-md-4">Upload Image</label>
                    <input type="file" class="form-control-file" id="image" name="image"  >
                    @error('image')
                        <strong>{{ $message }}</strong>                        
                    @enderror  
                </div>

                <div class="row mt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
              

            </div>
        </div>
    </form>

    
</div>
@endsection
