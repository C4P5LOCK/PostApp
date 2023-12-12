@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
           
                <div class="mb-4">
                    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a><span class="text-gray-600 text-sm"> {{$post->created_at->diffForHumans()}}</span>
               <p class="mb-2">{{$post->body}}</p>
                    &nbsp;
               <hr/>

               <div class="flex items-center">
                @auth
                @if(!$post->likedBy(auth()->user()))
                    <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                    @else
                    <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                    @endif

                    <form action="" method="post" class="mr-1">
                        
                        @csrf
                        <button type="submit" class="text-blue-500">Edit</button>
                    </form>
                    
                   
                    @can('delete',$post)
                    <form action="{{route('posts.destroy',$post->id)}}" method="post" class="mr-1">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                    @endcan
                  
                    @endauth
                    <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
               </div>
                </div>
           
        
        </div>
    </div>
@endsection