<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $rent = Rent::with(['user', 'barang', 'guru', 'tambahan'])
                ->where('user_id', $user->id)
                ->get();
            return view('profile', ['rent' => $rent]);
        } else {
            // Tampilkan pesan bahwa pengguna belum login
            return view('profile', ['rent' => []])->with('message', 'Anda belum login');
        }
    }


    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);

    }

    // public function show()
    // {
    //     $slug = "";
    //     $users = User::where('slug', $slug)->first();
    //     return view('user-detail', ['user' => $users]);
    //     // return view('user-detail');
    // }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        // if (!$user) {
        //     return redirect()->back()->with('error', 'User not found.');
        // }
        // $user->status = 'active';
        // $user->save();

        // return redirect('user/'.$slug)->with('status', 'User Approved Successfuly');
        return view('user-approve', ['user' => $user]);
        // return view('profile');

    }
    public function sure($slug)
    {
        // dd($request->all());
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user')->with('status', 'User Approved Successfuly');
    }
    public function delete($slug)
    {
       $user = User::where('slug', $slug)->first();
       return view('user-delete', ['user' => $user]);
    }
    public function destroy($slug)
    {
        // dd($request->all());
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('user')->with('status', 'User telah berhasil Dihapus');
    }
    public function userDeleted()
    {
        $userDeleted = User::onlyTrashed()->get();
        return view('user-deleted', ['userDeleted' => $userDeleted]);

    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('user')->with('status', 'User telah berhasil Dipulihkan');

    }

}
