<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::all();
        return view('Products.products', ['products' => $products]);
    }

    public function create() : View
    {
        return view('Products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'img' => 'required|url:http,https',
           'title' => 'required',
           'description' => 'nullable',
           'price' => 'required|decimal:0,2',
           'qty' => 'required|numeric',
        ]);
        $product = Product::create($data);
        return redirect(route('products.index'));
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return view('Products.productView', ['product' => $product]);
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('Products.edit', ['product' => $product]);
    }

    public function update(string $id, Request $request)
    {
        $data = $request->validate([
            'img' => 'required|url:http,https',
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|decimal:0,2',
            'qty' => 'required|numeric',
        ]);
        $product = Product::find($id);
        $product->img = $data['img'];
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->qty = $data['qty'];
        $product->save();
        return redirect(route('products.show', ['id' => $product->id]))->with('success', 'Product updated');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if($product->delete())
        {
            return redirect(route('products.index'))->with('success', "$product->title product removed");
        }
        else
        {
            return redirect(route('products.index'))->with('failure', "$product->title was not removed");
        }
    }
    public function buy(string $id, Request $request)
    {
        $product = Product::find($id);
        $qty = $request->validate([
            'qty' => 'required|numeric'
        ])['qty'];
        if ($qty <= $product->qty)
        {
            $product->qty -= $qty;
            $product->save();
            return redirect(route('products.show', ['id' => $product->id]))->with('success', "$qty products bought successfully");
        }
        else
        {
            return redirect(route('products.show', ['id' => $product->id]))->with('failure', "$qty not enough products");
        }
    }
}
