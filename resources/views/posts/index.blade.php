@extends('layouts.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-4">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div>
                        <a href="" class="font-bold">{{$post->user->name}}</a><span class=" text-gray-400 ml-2">{{$post->created_at->diffForHumans()}}</span>
                        <p class="my-2">{{$post->body}}</p>
                    </div>
                    <div>
                        @auth
                            <form action="{{route('posts.likes', $post->id)}}"  method="POST" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">like</button>
                            </form>
                            <form action="{{route('posts.likes', $post->id)}}" method="POST" class="mr-1>
                                @csrf
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @endauth
                        <span class="my-2">{{$post->likes->count()}}{{Str::plural('like', $post->likes->count())}}</span>
                    </div>
                @endforeach
            @else
                <p>There are no posts</p>
            @endif

            @if (session()->has('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session()->get('status') }}
                </div>
            @endif

            {{ $posts->links() }}
        </div>
    </div>
@endsection