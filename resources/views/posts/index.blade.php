@extends('layouts.app')

@section('content')
<div class="container"> 
    
    
    @if (count($posts) > 0)
        @foreach($posts as $post)
           
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{$post->user->id}}" ><img src="/storage/{{$post->image}}" alt="" class="w-100"></a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                
                <div class="col-6 offset-3"> 
                    
                    @if ($post->reacts->where('user_id',auth()->user()->id)->count()> 0)
                        <div style="display: flex;">
                            <i class="fa fa-heart pulse redheart" onclick="sendlove(this)" name="{{ $post->id }}"></i>
                            <p class="reactcounts" style="  margin-left: 8px;  margin-top: 2px;  ">{{$post->reacts->count()}} </p>
                            
                        </div>         
                    @else
                        <div style="display: flex;">
                            <i class="fa fa-heart pulse" onclick="sendlove(this)" name="{{ $post->id }}"></i>
                            <p class="reactcounts" style="  margin-left: 8px;  margin-top: 2px;  ">{{$post->reacts->count()}} </p> 
                            
                            
                        </div>         
                    @endif
                        
                        <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">{{$post->user->username}}</span>
                                </a>
                            </span> {{$post->caption}}
                        </p>
                    </div>
                </div>    
        @endforeach    
    @else
        <h5>Currently you are not following anyone!!</h5>
        <h6><a href="/follow">Click here</a> to follow others</h6>
        <h6><a href="/profile/{{ Auth::user()->id }}">Click here</a> to update your profile</h6>
    @endif

    
        
    
    
    

    

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
    

@endsection

<style>
    .fa-heart {
        color: #2d2929;
        font-size: 25px;
        cursor: pointer;
        transition: all 0.2s;
    } 
    .redheart{color: red;}   

</style>
    

<script>
    

    
    
    function sendlove (e){
        //$(e).css("color", "red")
        var postid = $(e).attr('name');     
        //console.log();       
        if($(e).css("color")==='rgb(45, 41, 41)'){             
            $.ajax({   
            url: '/user/{{ auth()->user()->id }}/post/'+postid,
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                //get_adminImages:true,orderid:id
            },
            success: function(data){
               // $('#result').html(data);
                $(e).css("color", "red");//unloved to loved 
                
                $(e).siblings().html(parseInt($(e).siblings().html())+1);
               console.log('hoho success');                
            }
            });
        }
        else{ 
            $.ajax({   
            url: '/user/{{ auth()->user()->id }}/post/'+postid,
            method:"DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                //get_adminImages:true,orderid:id
            },
            success: function(data){
               // $('#result').html(data);
               $(e).css("color", "#2d2929");//loved  to unloved
                
                $(e).siblings().html(parseInt($(e).siblings().html())-1);
               console.log('hoho success');                
            }
            });
         }
        

        
        
        

        

    }

</script>
