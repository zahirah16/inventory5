<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Rent;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    { 
        $barangCount = Barang::count();
            $guruCount = Guru::count();
            // $gunaCount = User::where('status', 'active')->count();
            $gunaCount = Siswa::count();
            $rentCount = Rent::count();
        $rent = Rent::with(['siswa', 'barang'])->get();
        return view('dashboard', ['rent' => $rent, 'barang_Count' => $barangCount, 'guru_Count' => $guruCount, 'guna_Count' => $gunaCount, 'rent_Count' => $rentCount ]);
    }

}
