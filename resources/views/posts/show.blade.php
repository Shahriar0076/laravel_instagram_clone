@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-8"><img src="/storage/{{$post->image}}" alt="" class="w-100"></div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class = "rounder-circle w-100" style = "max-width:40px" alt="">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}" class="pr-2">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a>
                            <a href="#" class="pl-2" style="border-left: 1px solid;">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </span> {{$post->caption}}
                </p>

            </div>
            <hr><hr>
            <h6 class="font-weight-bold">Comments : </h6>
            <div class="d-flex ">                
                <div class="pr-3">
                    <img src="{{$post->user->profile->profileImage()}}" class = "rounder-circle w-100" style = "max-width:40px" alt="">
                </div>               
                                   
                <div>
                    <a href="/profile/{{$post->user->id}}" class="pr-2 font-weight-bold">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>  
                    <p style = "">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam minima beatae odit, suscipit a dolor at</p>

                </div>                 
                    
                
            </div>
            <div class="d-flex align-content-space-between">
                <input type="text">
                <input type="submit">
            </div>

        </div>
    </div>
</div>
@endsection
