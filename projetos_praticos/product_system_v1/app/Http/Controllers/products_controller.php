<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Operations;

class products_controller extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    public function new()
    {
        return view('products.new');
    }

    public function show($id)
    {
        $product = Product::where('id', Operations::check_decrypt($id))->first();
        return view('products.show', ['product' => $product ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'min:3'],
            'price' => ['required', 'gt:0'],
            'quantity' => ['required', 'min:0']
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('products_index');
    }

    public function delete($id)
    {

    }
}
