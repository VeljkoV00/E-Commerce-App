<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function sendEmail(){

        $details = [
            'title' => 'Mail form veljkovelimirovic7@gmail.com',
            'body' => 'You have succesfully subscribed'
        ];
        Mail::to('borisveljko@gmail.com')->send(new Subscribe($details));
    
        return redirect()->route('home')->with('message', 'You have subscribed succesfully');
    }

    public function allProducts (){

        $products = Product::paginate(6);
        return view('shop.all-products', compact('products'));
    }


    


}
