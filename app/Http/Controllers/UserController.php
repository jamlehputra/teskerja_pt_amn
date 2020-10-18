<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->paginate(5);
        return view('user.index', compact('user'))
        ->with('i');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([             
            'name' => 'required',           
            'role' => 'required', 
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8|confirmed',                  
        ]);     
           
            $data = User::create([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 
            
        return redirect('user/index')
                ->with('success','User created successfully.');
    }
}
