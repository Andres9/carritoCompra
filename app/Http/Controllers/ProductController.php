<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index')->with([
            'products' => Product::all(),
        ]);
    }
    public function create()
    {
        return "This is the form to create a product";
    }
    public function store()
    {
        return view('This is the list of products');
    }
    public function show($product)
    {
        $product = Product::findOrFail($product);

        return view('products.show')->with([
            'product' => $product,
            'html' => "<h2>Subtitulo</h2>"
        ]);
    }
    public function edit($product)
    {
        return "Showing the form to edit the product with id {$product}";
    }
    public function update($product)
    {
    }
    public function destroy($product)
    {
    }
}
