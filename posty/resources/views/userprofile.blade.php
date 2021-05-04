@extends('layout.app')

@section('content')
<div class="flex justify-center">

        <div class="w-6/12 bg-white p-6 rounded-lg">
        @if( session('status') )
            <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif  
        <form action="{{ route('user.profile.update', $user) }}" method="POST">
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
                <label for="password_confirmation" class="sr-only">Password Again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter Password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div>
            <input type="checkbox" name="delete_user" id="delete_user" class="mr-2" >
            <label for="delete_user">Delete Profile</label>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                font-medium w-full">Update</button>
            </div>
        </form>
        </div>
    </div>
@endsection