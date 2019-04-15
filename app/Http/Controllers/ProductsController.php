<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Notification;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

//        $product = Product::first();
//        dd($product->category->category_name);

        return view('warehouse.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('warehouse.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->validate([
            'product_name'=>'required',
            'category_id'=> 'required',
            'price'=> 'required|integer',
            'quantity' => 'required|integer',
            'unit' => 'required',
            'barcode'=>'required|integer',

        ]));


        Notification::create([
            'name'=>'U shtua një produkt i ri',
            'description'=> 'U shtua produkti: ' . $request->input('product_name'),
            'visible'=>true,
            'type'=>'product',
            'user_id'=> '1',
//            using user_id = 1 for the moment
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product->id);
        $category = $product->category;


        return view('warehouse.edit', compact('product', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'product_name'=>'required',
            'category_id'=> 'required',
            'price'=> 'required|integer',
            'quantity' => 'required|integer',
            'unit' => 'required',
            'barcode'=>'required|integer',
        ]));

        return redirect('/products')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');

    }
}
