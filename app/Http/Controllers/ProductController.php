<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

    	$products = Product::all();
    	return view('admin.products.index' , compact('products'));

    }

    public function show($id){
    	$product = Product::find($id);
    	return view('admin.products.details' , compact('product'));
    }

    public function create(){
    	$product= new Product();
    	return view('admin.products.create', compact('product'));
    }

    public function destroy($id){

    	Product::destroy($id);

    	session()->flash('msg','Product has been deleted');

    	return redirect('admin/products');

    }

    public function edit($id){

    	$product = Product::find($id);
    	return view('admin.products.edit',compact('product'));
    }

    public function update(Request $Request,$id){
    	//find the product
    	$product = Product::find($id);
    	//validate the edit form
    	$Request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'description' => 'required',
    	]);

    	if ($Request->hasfile('image')) {
    		 if (file_exists(public_path('uploads/').$product->image)) {
    		 	# code...
    		 	unlink(public_path('uploads/').$product->image);
    		 }

    		 $image = $Request->image;
    		 $image->move('uploads',$image->getClientOriginalName());

    		 $product->image = $Request->image->getClientOriginalName();
    	}

    	$product->update([
    		'name' => $Request->name,
    		'price' => $Request->price,
    		'description' => $Request->description,
    		'image' => $product->image
    	]);

    	$Request->session()->flash('msg','Product has been updated');

    	return redirect('admin/products');
    }

    public function store(Request $Request){

    	//validation
    	$Request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'description' => 'required',
    		'image' => 'image|required',
    	]);

    	//upload the image
    	if($Request->hasfile('image')){
    		$image = $Request->image;
    		$image->move('uploads',$image->getClientOriginalName());
    	}

    	//save the data into database
    	Product::create([
    		'name' => $Request->name,
    		'price' => $Request->price,
    		'description' => $Request->description,
    		'image' => $Request->image->getClientOriginalName(),
    	]);

    	//session message
    	$Request->session()->flash('msg','Your product has been added');

    	//Redirect
    	return redirect('admin/products/create'); 
    }
}
