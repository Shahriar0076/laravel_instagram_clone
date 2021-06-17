<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;
use App\Models\User;
use App\Models\Post;
use App\Models\PostReacts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/email', function(){
    return new NewUserWelcomeMail();
});
Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::PATCH('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/follow', [App\Http\Controllers\FollowsController::class, 'findPeople']);



Route::get('/love', function(){
    //p3 has reacts
    $post = Post::find(3);
    //echo $post->reacts;
     foreach($post->reacts as $react){
         echo $react->user_id.'<br>';
     }
});


Route::post('/user/{userid}/post/{postid}', function($userid,$postid){    
    PostReacts::create(['user_id'=>$userid,'post_id'=>$postid]); 
    return $userid.'  number user and post number  '.$postid; 
});

Route::delete('/user/{userid}/post/{postid}', function($userid,$postid){   
    PostReacts::where('user_id',$userid)->where('post_id',$postid)->delete();
    return $userid.'  number user and post number  '.$postid; 
});




