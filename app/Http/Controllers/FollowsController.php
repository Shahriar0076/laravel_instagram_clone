<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }  

    public function store(\App\Models\User $user){
        return auth()->user()->following()->toggle($user->profile); //current auth user  
        
        
    }

    public function findPeople (User $user){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $userList = User::where('id', '!=', auth()->id())->get();
        //dd($user);
        return view('findPeople',compact('user','follows','userList'));
        
    }


}
