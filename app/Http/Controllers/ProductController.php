<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $input = $request->all();

        $path = \Storage::disk('s3')->put('files', $request->file('image'));
        $input['image'] = $path;
        Product::create($input);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $image = \Storage::disk('s3')->get($product->image);

        return view('welcome', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
    }
}
