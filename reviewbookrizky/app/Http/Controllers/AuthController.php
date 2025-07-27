<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function showregister()
  {
    return view('auth.register');
  }

  public function registeruser(Request $request)
  {
            // validation
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $userCount = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $userCount === 0 ? 'admin' : 'user';

        $user->save();

        return redirect('/')->with('success', 'Register Berhasil');
  }
  public function showlogin()
    {
        return view('auth.login');
    }

  public function login(Request $request)
    {
        $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
          $request->session()->regenerate();

          return redirect()->intended('/')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
          'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/')->with('success', 'Logout Berhasil');
    }
    public function getprofile()
    {
      $userAuth = Auth::User()->profile;
      
      $userId = Auth::id();

      $profileData = Profile::where('user_id', $userId)->first();

      if($userAuth->id){
          return view("profile.edit", ["profile" => $profileData]);
      }else{
          return view("profile.create");
      }
    }
    public function updateProfile(Request $request, $id)
    {
        // validation
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);

        $profile = Profile::find($id);
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();

        return redirect('/profile')->with('success', 'Berhasil Update Profile');
    }
}