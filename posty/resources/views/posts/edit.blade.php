@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            
            
            <form action="{{route('posts.update', $post)}}" method="POST" class='mb-4'>
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea id="body" name="body" cols="30" rows="4" class="bg-grey-100 border-2 
                    w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write a notice!">{{$post->body}}</textarea>
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection