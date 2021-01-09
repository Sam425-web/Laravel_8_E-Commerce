<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index()
    {
        $products = Product::inRandomOrder()->take(3)->get(); 
        return view('page.product') ;
    }

     public function show($id)
    {
         $product = Product::find($id);
         return view('page.product')->with(compact('product'));
    }

}