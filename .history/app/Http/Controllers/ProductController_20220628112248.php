<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);      
    }

    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price') 
        ]);

        $product->save();
        return response()->json('Product successfully created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
}
