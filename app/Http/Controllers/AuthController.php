<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function index()
    {
        return view('auth.login');
    }


    function login(Request $request)
    {
        $userDetails = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($userDetails)) {
            $request->session()->regenerate();
            return redirect('/league');
        }
        return redirect()->back()->withErrors([
            'password' => 'Invalid email or password',
        ])->withInput();
    }


    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    
        $user = User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role_id' => 1,
        ]);
    
        Auth::login($user); // Logging in the newly created user
        return redirect('/league');
    }



    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    function user(){
        return view('auth.user');
    }

    function signup(){
        return view('auth.signup');
    }

    function role (){
        $users = User::all();
        return view('auth.role', compact('users'));

    }

    public function updateRole(Request $request, User $user)
    {
        // Validate the role_id
        $request->validate([
            'role_id' => 'required|integer|in:1,2', 
        ]);
    
        // Update the user's role
        $user->role_id = $request->input('role_id');
        $user->save();
    
        // Redirect with success message
        return redirect()->back()->with('success', 'User role updated successfully!');
    }

    public function searchUser(Request $request){
        $search = $request->input('search');
    
        $users = User::where('name','like', '%' . $search . '%')->get();
    
        if ($users->count()>0) {
            return view('auth.role', compact('users', 'search'));
        }
        else { 
            return view('auth.role', ['message' => 'No Users found matching your search.']);
        }    
    }
    

    public function searchSuggestions(Request $request) {
        $search = $request->input('query');
    
        $suggestions = User::where('name', 'like', '%' . $search . '%')
                           ->limit(5)
                           ->pluck('name');
    
        return response()->json($suggestions);
    }
}