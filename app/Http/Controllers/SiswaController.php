<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Contoh validasi di dalam controller
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', ['siswa' => $siswa]);
    }



    public function delete($slug)
    {
        // dd($slug);
        $siswa = Siswa::where('slug', $slug)->first();
        return view('siswa-delete', ['siswa' => $siswa]);

    }
    public function destroy($slug)
    {
        // dd($request->all());
        $siswa = Siswa::where('slug', $slug)->first();
        $siswa->delete();
        return redirect('siswa')->with('status', 'nama siswa telah berhasil Dihapus');
    }

    public function siswaDeleted()
    {
        $siswaDeleted = Siswa::onlyTrashed()->get();
        return view('siswa-deleted-list', ['siswaDeleted' => $siswaDeleted]);

    }


    public function add()
    {
        $addsiswa = Siswa::all();
        return view('siswa-add', ['addsiswa' => $addsiswa]);
    }

    public function office(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'nis' => 'required|max:100',
            'nama' => 'required|max:100',
            'kelas' => 'required|max:100',
            
        ]);

        $siswa = Siswa::create($request->all());
        return redirect('siswa')->with('status', 'nama siswa telah berhasil ditambahkan');
    }


        public function getKelas($nama)
    {
        $siswa = Siswa::where('nama', $nama)->first();

        return response()->json(['kelas' => $siswa->kelas]);
    }

}


