<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() 
    {
        $product = Product::with('category')->latest()->paginate(10);

        return view ('pages.product.index', [
            "product" => $product,
        ]);
    }

    public function create() 
    {
        $categories = Category::all();

        return view('pages.product.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ], [
            "name.required" => "Nama produk/barang harus diisi!",
            "name.min" => "Minimal 3 karakter!",
            "price.required" => "Harga harus diisi!",
            "stock.required" => "Stock harus diisi!",
            "category_id.required" => "Kategori harus diisi!",
            "sku.required" => "Kode produk/barang harus diisi!",
        ]);

        Product::created($validated);

        return redirect('/product')->with('succsess', 'Berhasil menambahkan produk/barang');
    }

    public function edit($id) 
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

       return view('pages.product.edit', data: [
            "categories" => $categories,
            "product" => $product,
       ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ], [
            "name.required" => "Nama produk/barang harus diisi!",
            "name.min" => "Minimal 3 karakter!",
            "price.required" => "Harga harus diisi!",
            "stock.required" => "Stock harus diisi!",
            "category_id.required" => "Kategori harus diisi!",
            "sku.required" => "Kode produk/barang harus diisi!",
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/product')->with('succsess', 'Berhasil mengubah produk/barang');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/product')->with('succsess', 'Berhasil menghapus produk/barang');
    }
}
