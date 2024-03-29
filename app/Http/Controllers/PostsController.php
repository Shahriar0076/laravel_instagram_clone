<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }
    public function store(){
        $data = request()->validate([
           'caption' => 'required',
           'image'=> 'required|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);
        
        //$imagePath = request('image')->store('uploads','public');
        $imagePath = request()->image->store('uploads','public');

        //$image = Image::make("storage/{$imagePath}")->fit(1200,1200);
        //$image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        /*
            $post = new \App\Post
            $post->caption = $data['caption];
            $post->save();
        
        */
        //dd(request()->all());
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show (\App\Models\Post $post){
        //dd($post);
        return view('posts.show',compact('post'));
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->paginate(6);
        return view('posts.index',compact('posts'));
    }
}
