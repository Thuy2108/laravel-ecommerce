<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index()
    {
        $products = ProductModel::orderBy('product_id', 'desc')->get();

        return view('home', compact('products'));
    }
}
