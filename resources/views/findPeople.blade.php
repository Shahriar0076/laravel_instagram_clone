@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($userList as $list)
    <div class="row mt-5">        
        <div class="col-3"><a href="/profile/{{$list->id}}"><img src="{{$list->profile->profileImage()}}" alt="" class="w-50"></a></div>
        <div class="col-7"><a class="text-decoration-none" href="/profile/{{$list->id}}"><h5>{{$list->username}}</h5></a></div>
        <div class="col-2"><follow-button user-id="{{$list->id}}" follows="{{(auth()->user()) ? auth()->user()->following->contains($list->id) : false}}"></follow-button></div>
    </div>
    @endforeach
</div>
@endsection
