<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function index(){
       $users=User::all();
        return view('users.index',['users'=>$users]);
    }

public function create(){

    return view('users.create'  );
}
/************************************************SINGUP FUNCTION*******************************/
public function store(Request $request)
{
    $data = $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'min:8',
            'confirmed',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
        ],
    ], [
        'password.min' => 'The password must be at least 8 characters.',
        'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
    ]);
    $hashedPassword = Hash::make($data['password']);
    $data['password'] = $hashedPassword;
    $existingUser = User::where('email', $data['email'])->first();

    if ($existingUser) {
        return redirect()->back()->withInput()->with('error', 'User with this email already exists.');
    }

    $newUser = User::create($data);

    return redirect()->route('book.index')->with('success', 'Account Created Successfully!');
}
/************************************************LOGIN FUNCTION*******************************/
public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('userId', $user->id);
            Session::put('firstName', $user->firstName);
            Session::put('lastName', $user->lastName);
            Session::put('email', $user->email);
            return redirect()->intended('/'); 
        }
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

/*********************************************LOGOUT**************************************** */

public function logout(){
    Session::flush();
    return redirect()->intended('/')->with('success', 'Logged Out!');;

}
/*******************************************ADMIN FUNCTION********************************** */
public function admin(){
    $users=User::all();
     return view('users.admin',['users'=>$users]);
 }
/*********************************************DELETE FUNCTION****************************** */
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


