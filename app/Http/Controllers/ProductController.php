<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::latest()->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $validated =  $request->validate([
                'name' =>'required|max:255',
                'description' =>'required',
                'price' =>'required|numeric',
                'stock' =>'required|integer',
                'image' =>'required|image|mimes:jpg,jpeg,png',
            ]);
            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products'),$imageName);
                $validated['image'] = $imageName;
            }
            product::create($validated);
            return redirect()->route('products.index')->with('success',"Product Created Successfully");
    }
    public function show(product $product)
    {
        //
    }
    public function edit(product $product)
    {
        return view('products.edit',compact('product'));
    }
    public function update(Request $request, product $product)
    {
        $validated =  $request->validate([
                'name' =>'required|max:255',
                'description' =>'required',
                'price' =>'required',
                'stock' =>'required|numeric',
            ]);
            if($product->image) {
                $imagePath = public_path('uploads/products/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/products'),$imageName);
                $validated['image'] = $imageName;
            }

            $product->update($validated);
            return redirect()->route('products.index')->with('success',"Product Updated Successfully");
    }
    public function destroy(product $product)
    {
        if($product->image) {
            $imagePath = public_path('uploads/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('success',"Product Deleted Successfully");
    }
}
