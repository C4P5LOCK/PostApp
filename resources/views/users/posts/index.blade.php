@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if($posts->count())
            @foreach ($posts as $post )
                <div class="mb-4">
                    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a><span class="text-gray-600 text-sm"> {{$post->created_at->diffForHumans()}}</span>
               <p class="mb-2">{{$post->body}}</p>

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
            @endforeach
            
            {{$posts->links()}}
        @else
                <p> No Posts</p>
        @endif
        </div>
    </div>
@endsection