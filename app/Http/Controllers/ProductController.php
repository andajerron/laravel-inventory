<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function createProduct(Request $request){
       $prodName =  $request->input('product_name');
       $unit =  $request->input('unit');
       $price =  $request->input('price');
       $dateOfExpiry =  $request->input('date_of_expiry');
       $availInventory =  $request->input('available_inventory');
       $availInventoryCost =  $request->input('available_inventory_cost');
       $image =  $request->input('image');

       DB::table('products')->insert(['product_name'=>$prodName,
                        'unit'=>$unit,
                        'price'=>$price,
                        'date_of_expiry'=>$dateOfExpiry,
                        'available_inventory'=>$availInventory,
                        'available_inventory_cost'=>$availInventoryCost,
                        'image'=>$image]);

       return redirect()->back();
    }
    function readProduct(){
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    function updateProduct(Request $request, $id){
        $prodName =  $request->input('product_name');
        $unit =  $request->input('unit');
        $price =  $request->input('price');
        $dateOfExpiry =  $request->input('date_of_expiry');
        $availInventory =  $request->input('available_inventory');
        $availInventoryCost =  $request->input('available_inventory_cost');
        $image =  $request->input('image');

        DB::table('products')->where(['id'=>$id])->update(['product_name'=>$prodName,
                         'unit'=>$unit,
                         'price'=>$price,
                         'date_of_expiry'=>$dateOfExpiry,
                         'available_inventory'=>$availInventory,
                         'available_inventory_cost'=>$availInventoryCost,
                         'image'=>$image]);

        return redirect()->back();
    }
    function deleteProduct($id){
        Product::find($id)->delete();
        return redirect()->back();
    }
}
