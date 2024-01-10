<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rent = Rent::with(['user', 'barang', 'guru', 'tambahan'])->get();
        return view('rent', ['rent' => $rent ]);
    }

}
