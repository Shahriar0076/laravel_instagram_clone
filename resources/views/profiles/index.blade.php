@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3"><img src="{{$user->profile->profileImage()}}" alt="" style="max-height: 220px;" class="rounded-circle"></div>
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h3>{{$user->username}}</h3>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                @can('update',$user->profile)
                    <a href="/p/create">Add new post </a>
                @endcan  
            </div>
            @can('update',$user->profile)
                <div><a href="/profile/{{$user->id}}/edit">Edit Profile</a></div>
            @endcan            
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()  ?? ''}}</strong> posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()  ?? ''}}</strong> followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{$user->profile->title ?? ''}}</strong></div>
            <div class="">{{$user->profile->description ?? ''}}</div>
            <div class=""><strong><a href="#">{{$user->profile->url ?? ''}}</a></strong></div>

        </div>
        
    </div>

    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" alt="postimage" class="w-100 pt-5"></a>
        </div>
        @endforeach        
    </div>
</div>
@endsection
