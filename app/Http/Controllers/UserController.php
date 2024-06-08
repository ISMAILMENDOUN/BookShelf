<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
       $users=User::all();
        return view('users.index',['users'=>$users]);
    }

public function create(){

    return view('users.create'  );
}

public function store(Request $request){

$data=$request->validate([
'firstName'=>'required',
'lastName'=>'required',
'email'=>'required',
'password'=>'required',


]);
$newUser=User::create($data);
return redirect()->route('user.index')->with('success', 'User created successfully!');
}

public function delete(User $user){

$user->delete();
return redirect()->route('user.index')->with('success', 'User deleted successfully!');
}
public function update(User $user){

    return view('users.update',['user'=>$user]);
}
public function updated(User $user, Request $request){

    $data=$request->validate([
        'firstName'=>'required',
        'lastName'=>'required',
        'email'=>'required',
        'password'=>'required',
        
        
        ]);
    $user->update($data);
    return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }
    
}


