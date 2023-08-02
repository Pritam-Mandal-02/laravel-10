<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryList = Category::get()->pluck('name', 'id');
        return view("product.create", compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $this->imageUpload($request->validated(), 'image', 'uploads/products');
        Product::create($data);
        Session::flash('success', 'Product created successfully.');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view("product.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categoryList = Category::get()->pluck('name', 'id');
        return view("product.edit", compact('product', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $this->imageUpload($request->validated(), 'image', 'uploads/products');
        $product->update($data);
        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('success', 'Product deleted successfully.');
        return redirect()->route('home');
    }
}
