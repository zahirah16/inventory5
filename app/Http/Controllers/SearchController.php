<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    

    public function searchByCategory(Request $request)
    {
        // Mengambil parameter "category" sebagai array
        $categories = $request->input('category', []);
    
        // Mengambil barang dengan kategori yang dipilih
        $filteredResults = Barang::whereIn('category_id', $categories)->get();
    
        // Lakukan sesuatu dengan hasil pencarian, misalnya tampilkan dalam tampilan
        return view('hasil_pencarian', ['results' => $filteredResults]);
    }
} 


