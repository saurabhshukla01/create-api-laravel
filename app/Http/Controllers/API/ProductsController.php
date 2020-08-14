<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth; 
use App\Product;
use Validator;

class ProductsController extends Controller
{
    // Not used Validation while creating api in Laravel
    /*
    public function save(Request $req){
    	// return Product::all();
    	$product = new Product();
    	$product->name = $req->name;
    	$product->category = $req->category;
    	$product->price = $req->price;
    	//echo $product->save();
    	if($product->save()){
    		return "Product has been Saved";
    	}

    }
    */

    // Use Validation while creating api in Laravel

    public function save(Request $req){

        $valid = Validator::make($req->all(),[
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
        ]);
        if($valid->fails()){
            return response()->json(['error'=>$valid->errors()],403);
        }

        $product = new Product();
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;
        //echo $product->save();
        if($product->save()){
            return "Product has been Saved";
        }

    }

    public function update(Request $req){
        // return $req->input();
        $product = new Product();
        $product = Product::find($req->id);
        // $product->name = $req->name;
        // $product->category = $req->category;
        $product->price = $req->price;
        if($product->save()){
            return ['Result'=>"Success","msg"=>"Product has been Updated"];
        }

    }


}
