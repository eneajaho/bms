<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Notification;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $category = Category::first();
//        dd($category->products->count());

        $categories = Category::all();
        $products = Product::all();

        return view('category.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->validate([
            'category_name'=>'required',
            'logo'=> 'required',
            'color'=> 'required',
        ]));

        Notification::create([
            'name'=>'U shtua një kategori e re',
            'description'=> 'U shtua kategoria: ' . $request->input('category_name'),
            'visible'=>true,
            'type'=>'category',
            'user_id'=> '1',
//            using user_id = 1 for the moment
        ]);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->validate([
            'category_name'=>'required',
            'logo'=> 'required',
            'color'=>'required',
        ]));

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category');
    }
}
