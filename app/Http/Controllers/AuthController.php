<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // login valid

        if (Auth::attempt($credentials)) {
            // status =active
            if(Auth::user()->status != "active"){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('massage', 'your accont is not active');
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }
            
            if(Auth::user()->role_id == 2){
                return redirect('profile');
            }


            
            
            // return redirect();
        }
            Session::flash('status', 'failed');
            Session::flash('massage', 'login Invalid');
            return redirect('/login');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function RegisterProses(Request $request)
    {
        $validated = $request->validate([
            // 'id' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'nis' => 'required|max:11',
            'kelas' => 'required|max:255'
        ]);
        
        
        $user = User::create($request->all());



        Session::flash('status', 'success');
        Session::flash('massage', 'register success. Wait admin for approval');
        return redirect('register');
    }

}