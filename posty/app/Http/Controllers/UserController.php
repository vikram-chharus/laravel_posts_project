<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
        {
            $this->middleware(['auth']);
        }
    public function viewDetails(User $user)
    {
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
       $posts = Post::get()->where('user_id', $user->id);
        return view('userdetail', [
            "user"=>$user,
            "posts"=>$posts
        ]);
    }
    public function update(Request $request, User $user){
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
        if($request->delete_user == "on")
        {
            $user->delete();
            return redirect()->route('dashboard')->with('status', 'User deleted successfully!!');
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->isadmin == "on")
        {
            $user->IsAdmin = 1;
        }
        else{
            $user->IsAdmin = 0;;
        }
        if($request->password != "")
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return back()->with('status', 'Profile updated successfully!!');
    }
}
