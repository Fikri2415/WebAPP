<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:categories,name,except",
        ], [
            "name.required" => "Nama kategori harus diisi!",
            "name.unique" => "Nama kategori sudah ada!",
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('succsess', 'Berhasil menambahkan kategori');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:categories,name,except",
        ], [
            "name.required" => "Nama kategori harus diisi!",
            "name.unique" => "Nama kategori sudah ada!",
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('succsess', value: 'Berhasil mengubah kategori');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();

        return redirect('/categories')->with('succsess', 'Berhasil menghapus kategori');
    }
}
