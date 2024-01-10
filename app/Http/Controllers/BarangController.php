<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
 
    public function index(Request $request)
{
    $categories = Category::all();

    $query = Barang::query();

    // Pencarian berdasarkan 'nama_barang' jika diisi
    if ($request->nama_barang) {
        $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
    }

    // Pencarian berdasarkan 'category' jika dipilih
    if ($request->category) {
        $query->whereHas('categories', function ($q) use ($request) {
            $q->where('categories.id', $request->category);
        });
    }

    $isibarang = $query->get();

    // Menghitung kolom "Jumlah" di sisi server
    $isibarang->each(function ($barang) {
        $barang->jumlah_barang = $barang->layak + $barang->tidak_layak;
    });

    return view('barang', ['isibarang' => $isibarang, 'categories' => $categories]);
}

    // public function index(Request $request)
    // {
    //     $categories = Category::all();

    //     $isibarang = Barang::query();
        
    //     if ($request->category || $request->nama_barang) {
    //         $isibarang = Barang::where('nama_barang', 'like', '%'.$request->nama_barang.'%')
    //                             ->orwhereHas('categories', function($q) use($request) {
    //                                 $q->where('categories.id', $request->category) ;
    //                             })
    //                             ->get();
                                
    //         // Menghitung kolom "Jumlah" di sisi server
    //         foreach ($isibarang as $barang) {
    //             $barang->jumlah_barang = $barang->layak + $barang->tidak_layak;
    //         }


    //     }
    //     else {
    //         $isibarang = Barang::all();

    //         // Menghitung kolom "Jumlah" di sisi server
    //         foreach ($isibarang as $barang) {
    //             $barang->jumlah_barang = $barang->layak + $barang->tidak_layak;
    //         }
    //     }
     
    //     return view('barang', ['isibarang' => $isibarang, 'categories'=>$categories]);
    // }

    public function add()
    {
        $categories = Category::all();
        return view('barang-add', ['categories' => $categories]);
    }

//     public function office(Request $request)
// {
//     $validated = $request->validate([
//         'kode_barang' => 'required|unique:barang|max:255',
//         'nama_barang' => 'required|max:255',
//         'layak' => 'required|integer', // Validasi untuk layak
//         'tidak_layak' => 'required|integer', // Validasi untuk tidak_layak
//     ]);
//     dd($request->all());
//     $barang = Barang::create($request->all());
    
//     // Menghitung jumlah_barang
//     $barang->jumlah_barang = $request->layak + $request->tidak_layak;


//     $barang->save();
//     $barang->categories()->sync($request->categories);

//     return redirect('barang')->with('status', 'Barang telah berhasil ditambahkan');
// }


    public function office(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'kode_barang' => 'required|unique:barang|max:255',
            'nama_barang' => 'required|max:255',
            
        ]);

        $barang = Barang::create($request->all());
        $barang->categories()->sync($request->categories);
        return redirect('barang')->with('status', 'Barang telah berhasil ditambahkan');
    }


    public function edit($slug)
    {
        // dd($request->all());
        $barang = Barang::where('slug', $slug)->first();
        $categories = Category::all();
        return view('barang-edit', ['categories' => $categories, 'barang' => $barang]);
    }
    
    public function update(Request $request, $slug)
    {
        
        $barang = Barang::where('slug', $slug)->first();
        $barang->update($request->all());

        if ($request->categories){
            $barang->categories()->sync($request->categories);
        }

        return redirect('barang')->with('status', 'Barang telah berhasil diedit');
       
    }


    

    public function delete($slug)
    {
        // dd($slug);
        $barang = Barang::where('slug', $slug)->first();
        return view('barang-delete', ['barang' => $barang]);

    }
    public function destroy($slug)
    {
        // dd($request->all());
        $barang = Barang::where('slug', $slug)->first();
        $barang->delete();
        return redirect('barang')->with('status', 'Barang telah berhasil Dihapus');
    }

    public function barangDeleted()
    {
        $barangDeleted = Barang::onlyTrashed()->get();
        return view('barang-deleted-list', ['barangDeleted' => $barangDeleted]);

    }

    public function restore($slug)
    {
        $barang = Barang::withTrashed()->where('slug', $slug)->first();
        $barang->restore();
        // $barangDeleted = Barang::onlyTrashed()->get();
        return redirect('barang')->with('status', 'Barang telah berhasil Dipulihkan');

    }

}

