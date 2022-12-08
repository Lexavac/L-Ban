<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $class = Product::with('category')->get();
        return view('product', compact('class'));
    }
}
