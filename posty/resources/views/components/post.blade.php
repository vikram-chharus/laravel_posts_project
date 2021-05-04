@props(['post' => $post])
<div class="mb-4">
                        <a href="{{ route('user.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> 
                        <span class="text-grey-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        @if(Str::is(URL::current(),"http://127.0.0.1:8000/posts/$post->id/show"))
                            <p class="mb-2"> {{$post->body}}</p>
                            @can('delete', $post)
                        @endcan
                        @if(auth()->user()->IsAdmin)
                        <form class="mr-1" action="{{route('posts.edit', $post)}}" method="get">
                            @csrf
                            <button type="submit" class="tmb-2 text-yellow-500">Edit</button>
                        </form>
                        <form class="mr-1" action="{{route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tmb-2 text-red-500">Delete</button>
                        </form>
                        @endif
                        @else
                            @if(Str::length($post->body) > 50)
                                <p class="mb-2"> {{Str::limit($post->body, 50)}}</p>
                            @else
                                <p class="mb-2"> {{$post->body}}</p>
                            @endif
                        @endif
                        
                        
                    
                        @if(!Str::is(URL::current(),"http://127.0.0.1:8000/posts/$post->id/show"))
                        <span class="text-blue-500"><a href="{{route('posts.show', $post->id)}}">Read more</a></span>
                        @endif
                        
                        
                        
                   
                   
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