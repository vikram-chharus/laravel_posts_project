@props(['post' => $post])
<div class="mb-4">
                        <a href="{{ route('user.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> 
                        <span class="text-grey-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <p class="mb-2"> {{$post->body}}</p>
                    
                    
                    @can('delete', $post)
                        <form class="mr-1" action="{{route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Delete</button>
                        </form>
                    @endcan
                   
                   
                    <div class="flex items-center">
                    @auth
                        @if(!$post->likedBy(auth()->user()))
                            <form class="mr-1" action="{{ route('posts.likes', $post)}}" method="post">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            <form class="mr-1" action="{{route('posts.likes', $post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                         @endif 

                         
                         @endauth      
                        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>

                    </div>    


                    </div>