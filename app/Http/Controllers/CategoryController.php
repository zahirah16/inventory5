<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }
    public function add()
    {
        return view('category-add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category ::create($request->all());
        return redirect('categories')->with('status', 'Kategori telah berhasil ditambahkan');
    }
    public function edit($slug)
    {
        // dd($request->all());
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }
    
    public function update(Request $request, $slug)
    {
        // dd($slug);
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Kategori telah berhasil di edit');
    }
    public function delete($slug)
    {
        // dd($slug);
        $category = Category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);

    }

    public function destroy($slug)
    {
        // dd($request->all());
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Kategori telah berhasil Dihapus');
    }
    public function categoryDeleted()
    {
        $categoryDeleted = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['categoryDeleted' => $categoryDeleted]);

    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Kategori telah berhasil Dipulihkan');

    }

}
