@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12">
        <div class="p-6">
        <h1 class="text-2xl font-medium mb-1">Manage user's Profile</h1>
        </div>
        <div class="bg-white p-6 rounded-lg">
        @if( session('status') )
            <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif  
        <div>
        <form action="{{route('manage.user.update', $user)}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{$user->name}}">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Username"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{$user->username}}">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Email"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{$user->email}}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <div class="flex items-center p-2">
                    <input type="checkbox" name="isadmin" id="isadmin" class="mr-2" 
                    @if($user->IsAdmin) 
                    checked 
                    @endif>
                    <label for="isadmin">Admin</label>
                    <div class="text-red-500 p-3">
                    <input type="checkbox" name="delete_user" id="delete_user" class="mr-2" >
                    <label for="isadmin">Delete User</label>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                font-medium w-full">Update</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
    <div class="flex justify-center">
        <div class="w-8/12">
        <div class="p-6">
        <h1 class="text-2xl font-medium mb-1">Manage user's posts</h1>
        </div>
        <div class="bg-white p-6 rounded-lg">
        <div>
        @if($posts->count())
                @foreach($posts as $post)
                <div class="border-2 p-2 rounded-lg mb-2">
                <x-post :post="$post" />
                <form class="mr-1" action="{{route('posts.edit', $post)}}" method="get">
                            @csrf
                            <button type="submit" class="tmb-2 text-yellow-500">Edit</button>
                </form>
                <form class="mr-1" action="{{route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tmb-2 text-red-500">Delete</button>
                </form>
                </div>
                @endforeach     
            @else   
                <p>No Posts</p>
            @endif
        </div>
        </div>
    </div>
    </div>
@endsection