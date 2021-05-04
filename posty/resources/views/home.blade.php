@extends('layout.app')

@section('content')
    @if( session('status') )
            <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif  
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        @if($posts->count())
                @foreach($posts as $post)
                <x-post :post="$post" />
                @endforeach     
                {{$posts->links()}}
            @else   
                <p>No updates till now. Check later</p>
            @endif
        </div>
    </div>
@endsection