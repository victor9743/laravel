<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $product = new Product();
        $product->name = $request->name;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($product): View
    {
        $product = Product::find(Crypt::decrypt($product));

        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validation($request);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find(Crypt::decrypt($product));
        $product->delete();
        return redirect()->route('products.index');
    }

    private function validation($request): Void
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cost_price' => ['required', 'numeric', 'min:0.01','lt:selling_price'],
            'selling_price' => ['required', 'numeric', 'min:0.01', 'gt:cost_price'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
        ], [
            'name.required' => 'Campo Nome obrigatório',
            'cost_price.required' => 'Preço de custo obrigatório',
            'cost_price.min' => 'Preço de custo deve ser maior que :min',
            'cost_price.lt' => 'Preço de custo deve ser menor que o preço de venda',
            'selling_price.required' => 'Preço de venda obrigatório',
            'selling_price.min' => 'Preço de venda deve ser maior que o preço de custo',
            'cost_price.gt' => 'Preço de venda deve ser maior que o preço de custo',
            'stock_quantity.required' => 'Quantidade de estoque obrigatório',
        ]);
    }
}
