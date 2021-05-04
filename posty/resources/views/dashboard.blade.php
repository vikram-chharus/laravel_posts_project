@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12">
        <div class="p-6">
        <h1 class="text-2xl font-medium mb-1">Overview</h1>
        </div>
        <div class="bg-white p-6 rounded-lg">
           <div>
           Total reactions: {{$totalReactions}}
           Total notices: {{$totalNotices}}
           Total users: {{sizeof($users)}}
           </div>
        </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-8/12">
        <div class="p-6">
        @if( session('status') )
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-2xl font-medium mb-1">Manage Users</h1>
        <span class="text-blue-500"><a href="{{route('register.admin')}}">Add user</a></span> 
        </div>
        <div class="bg-white p-6 rounded-lg">
        <div>
           @foreach($users as $user)
           <h3><a href="{{route('manage.user', $user)}}">{{$user->name}}</a></h3>
           @endforeach
           </div>
        </div>
        </div>
    </div>
@endsection