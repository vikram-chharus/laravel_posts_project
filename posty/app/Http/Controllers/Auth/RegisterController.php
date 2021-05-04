<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware(['guest'])->except('index_admin');
    }
    
    public function index(){
        return view('auth.register');
    }
    public function index_admin(){
        return view('auth.register');
    }
    public function store(Request $request){
    
        auth()->logout();    
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);
        
        User::create(
            [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'IsAdmin' => false
            ]
        );
        if(!auth())
        {
            auth()->attempt($request->only('email', 'password'));
            return redirect()->route('home');
        }
        return redirect()->route('dashboard');
        
        
    }
}
