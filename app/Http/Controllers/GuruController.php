<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $isiguru = Guru::all();
        return view('guru', ['isiguru' => $isiguru]);
    }

    public function add()
    {
        $addguru = Guru::all();
        return view('guru-add', ['addguru' => $addguru]);
    }

    public function office(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'nip' => 'required|max:100',
            'name' => 'required|max:100',
            'mapel' => 'required|max:100',
        ]);

        $guru = Guru::create($request->all());
        return redirect('guru')->with('status', 'Guru telah berhasil ditambahkan');
    }
}
