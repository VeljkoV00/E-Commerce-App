<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Munna\ShoppingCart\Facades\Cart;

class CartController extends Controller
{
    public function store($id){

        $product = Product::find($id);


        $product_id = $product->id;
        $product_name = $product->name; // Required
        $product_qty = 1; // Required
        $product_price = $product->price;// Required

        $newCart = Cart::add($product_id, $product_name, $product_qty, $product_price);

       return redirect()->route('home');
       
    }


    public function cart(){

        $cart = Cart::items();



        return view('cart.index', compact('cart'));
        
    }

}
