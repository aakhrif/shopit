<?php

namespace App\Http\Controllers;

use App\Models\Product;

abstract class Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }
}
