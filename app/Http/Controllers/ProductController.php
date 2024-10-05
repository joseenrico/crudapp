<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index()
    {
        $product = Product::all();

        return view('products.index', [
            'product' => $product
        ]);
    }

    function add()
    {
        return view('products.add');
    }

    function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description'  => 'required|string'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->save();

        return redirect('/')->with('success', 'Produk berhasil disimpan.');
    }

    function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description'  => 'required|string'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->update();

        return redirect('/')->with('success', 'Produk berhasil diedit.');
    }

    function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/')->with('success', 'Produk berhasil dihapus.');
    }
}
