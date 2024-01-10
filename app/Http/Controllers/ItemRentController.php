<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Rent;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemRentController extends Controller
{

    public function index(){
        $users = User::all();
        // where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $kelas = Siswa::all();
        $guru = Guru::all();
        $siswa = Siswa::all();
        $barang = Barang::all();
        $tambahan = Barang::all();
        return view('item-rent', ['users' => $users, 'kelas' => $kelas, 'guru' => $guru, 'siswa' => $siswa, 'barang' => $barang, 'tambahan' => $tambahan]);
    }
    public function office(Request $request){
        // dd($request->all());
        $request['rent_date'] = Carbon::now()->toDateString();

        $barang = Barang::findOrFail($request->id_barang)->only('status');
        if ($barang['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the item is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('dashboard');
            // dd('dipinjam');
        }
        else {
            // dd($request->all());
           try {
            DB::beginTransaction();
            //ke rent log
            Rent::create($request->all());
            //update
            $barang = Barang::findOrFail($request->id_barang);
            if ($barang->jumlah_barang > 0) {
                $barang->jumlah_barang -= 1;

                if ($barang->jumlah_barang === 0) {
                    $barang->status = 'not available';
                }

                $barang->save();
                DB::commit();

                return redirect('/dashboard')->with('success', 'Barang berhasil dipinjam.');
            }
            // $barang->status = 'not available';
            // $barang->save();
            // DB::commit();

            // Session::flash('message', 'Rent item success!!!');
            // Session::flash('alert-class', 'alert-success');
            // return redirect('dashboard');
           } catch (\Throwable $th) {
               DB::rollBack();
               dd($th);
           }
        }
    }





    //pengembalian
    public function kembali($slug)
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $kelas = Siswa::all();
        $guru = Guru::all();
        $siswa = Siswa::all();
        $barang = Barang::all();
        $tambahan = Barang::all();
        $back = Rent::where('slug', $slug)->first(); // Use first() to get a single item
        return view('back', ['users' => $users, 'kelas' => $kelas, 'guru' => $guru, 'siswa' => $siswa, 'barang' => $barang, 'tambahan' => $tambahan, 'back' => $back]);
    }


    public function simpan(Request $request)
    {

        // Validasi permintaan
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
        ]);

        // Temukan barang berdasarkan ID
        $barang = Barang::findOrFail($request->id_barang);

        // Temukan entri sewa yang sesuai berdasarkan user_id, id_barang, dan return_date null
        $rent = Rent::where('user_id', $request->user_id)
                    ->whereNull('return_date')
                    ->first();

        // Periksa apakah entri sewa ditemukan
        if ($rent) {
            // Ubah status barang menjadi "in stock"
            $rent->status = 'DIKEMBALIKAN';

            // Set tanggal pengembalian pada entri sewa
            $rent->return_date = now(); // Gunakan tanggal dan waktu saat ini

            $barang->save();
            $rent->save();


            return redirect('dashboard')->with('success', 'Barang berhasil dikembalikan.');
        } else {
            return redirect('dashboard')->with('error', 'Barang tidak dapat dikembalikan karena status tidak valid atau entri sewa tidak ditemukan.');
        }
    }

    

}
