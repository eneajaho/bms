<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use App\Table;
use App\Category;
use App\Notification;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [
            'Enea',
            'Geni',
            'Esli',
        ];

        $orders = Order::with('table', 'orderDetails.product.category')->get();
//        $tables = Table::all();

        return view('order.index', compact( 'users', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = [
            'Enea',
            'Geni',
            'Esli',
        ];

        $tables = Table::all();
        $categories = Category::all();
        $products = Product::all();

        return view('order.create', compact('products', 'categories', 'tables', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = Order::create($request->validate([
            'user_id'=>'required|integer',
            'table_id'=>'required|integer',
        ]));


        $data = $request->all();

        foreach ($data['product_id'] as $key => $product_id){
            $quantity = $data['quantity'][$key];
            $product = Product::where('id', '=', $product_id)->first();

            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'discount'=> 0,
                'price' => $product->selling_price_per_unit * $quantity,
            ]);
        }

        $table = Table::where('id', '=', $request->table_id)->first();
        $table->update([
            'free' => false,
        ]);


        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::first();

        dd($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

//        $categories = Category::all();
//        $product = Product::findOrFail($product->id);
//        $category = $product->category;
//        return view('warehouse.edit', compact('product', 'categories', 'category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
//        $product->update($request->validate([
//            'product_name'=>'required',
//            'category_id'=>'required',
//            'product_price'=> 'required|integer',
//            'product_qty' => 'required|integer'
//        ]));
//
//        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

//        $product->delete();
//        return redirect('/products');

    }

    public function pay(Order $order)
    {
        $order = Order::findOrFail($order->id);
        $order->update([
            'completed' => true,
        ]);

        $table = Table::where('id', '=', $order->table->id)->first();
        $table->update([
            'free' => true,
        ]);
        return redirect()->back();
    }
}
