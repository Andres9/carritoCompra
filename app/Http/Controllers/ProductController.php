<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
    }

    public function index()
    {
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
     
    /*     if ($request->status == 'available' && $request->stock == 0) { */
          /*   session()->flash('error', 'if available must have stock '); */
            /* session()->put('error','if available must have stock '); */

   /*          return redirect()
                            ->back()
                            ->withInput($request->all())
                            ->withErrors('if available must have stock ');
        } */

        /* session()->forget('error'); */

        /*    $product = Product::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);*/

        $product = Product::create($request->validated());
     /*    session()->flash('success', "The new product with id {$product -> id} was created"); */
        /*     return $product; */
        //Formas de redireccionar
        /*     return redirect() -> back();
    return redirect() -> action("MainController@index"); */
        return redirect()
        ->route("products.index")
        ->withSuccess("The new product with id {$product -> id} was created");
    }

    /* --------------------- Inyeccion implicita de modelos --------------------- */
    public function show(Product $product)
    {

     /*    $product = Product::findOrFail($product); */

        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit($product)
    {
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }

    public function update(ProductRequest $request,Product $product)
    {

/*         $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in: available,unavailable'],
        ];

        request()->validate($rules); */

        $product->update(request()->validated());

        return redirect()
        ->route("products.index")
        ->withSuccess("The product with id {$product -> id} was edited. ");
    }

    public function destroy(Product $product)
    {
   
        $product->delete();
        return redirect()
        ->route("products.index")
        ->withSuccess("The product with id {$product -> id} was delete. ");;
    }
}
