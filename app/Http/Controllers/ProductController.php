<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $imagePath = 'storage/' .  $request->file('image')->store('productImages' ,'public');
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');

        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->image = $imagePath;
        $product->category_id = $category_id;
        $product->save();


        return redirect()->route('products.index')->with('success', 'Product has been created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, Product $product)
    {
        $imagePath = 'storage/' .  $request->file('image')->store('productImages' ,'public');
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');

        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->image = $imagePath;
        $product->category_id = $category_id;
        $product->save();
        
        return redirect()->route('products.index')->with('success', 'Product has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted');

    
    }
}
