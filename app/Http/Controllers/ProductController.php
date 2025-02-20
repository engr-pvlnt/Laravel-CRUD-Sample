<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all(); //get all products information
        return view('products.index',['products'=>$products]); //put in array
    }

    public function create(){
        return view('products.create');
    }

    public function save(Request $request){
        //dd($request);
        //dd($request->name);
        //Validation
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric', 
            'description' => 'nullable'
        ]);
        
        // Round the price to 2 decimal places
        $data['price'] = round($data['price'], 2);
        
        // Save to DB
        $newProduct = Product::create($data);

        //return to index page
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        //dd($product); //download information
        return view('products.edit',['product'=>$product]); //put in array
    }

    public function update(Product $product, Request $request){
        //dd($product); //download information
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric', 
            'description' => 'nullable'
        ]);        
        
        $product->update($data);

        return redirect(route('product.index'))->with('success','Product Updated Successfully.');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success','Product Deleted Successfully.');
    }


}
