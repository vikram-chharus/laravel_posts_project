<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index(){
        if(!auth()->user()->IsAdmin)
        {
            return back();
        }
        $Users = User::get();
        $Posts = Post::get();
        $totalPost  = sizeof($Posts);
        $totalReactions = 0;
        foreach($Users as $user)
        {
            $totalReactions += sizeof($user->likes);
        }
        
        return view('dashboard')->with(["users"=>$Users,
         "posts"=>$Posts,
         "totalReactions"=>$totalReactions,
         "totalNotices"=>$totalPost]);
    }
}
