<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $man = Product::where('category_id', '1')->get();
        $women = Product::where('category_id', '3')->get();
        $kid = Product::where('category_id', '4')->get();

        return view('shop.index', compact('man', 'women', 'kid'));
    }


    public function show ($id){

        $product = Product::find($id);
        return view('single-product', compact('product'));
    }


}
