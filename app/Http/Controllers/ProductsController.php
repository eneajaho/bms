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
        $products = Product::with('category')->paginate(50);
        return view('warehouse.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.create')->withCategories(Category::all());
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
            'buying_price_per_unit'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'selling_price_per_unit'=> 'required|numeric',
            'tax'=> 'required|numeric',
            'unit' => 'required',
            'barcode'=>'required|numeric',
        ]));

//        Notification::create([
//            'name'=>'U shtua një produkt i ri',
//            'description'=> 'U shtua produkti: ' . $request->input('product_name'),
//            'visible'=>true,
//            'type'=>'product',
//            'user_id'=> '1',
////            using user_id = 1 for the moment
//        ]);
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
        $product = Product::findOrFail($product->id);

        return view('warehouse.show', compact('product'));
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

        return view('warehouse.edit', compact('categories','product', 'category'));
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
            'buying_price_per_unit'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'selling_price_per_unit'=> 'required|numeric',
            'tax'=> 'required|numeric',
            'unit' => 'required',
            'barcode'=>'required|numeric',
        ]));

        return redirect('/products');
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


    public function add(Request $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        $current_quantity = $product->quantity;
        $quantity_to_add = $request->input('add_quantity');
        $product->update([
            'quantity'=> $current_quantity + $quantity_to_add,
        ]);
        return redirect()->back();
    }
}
