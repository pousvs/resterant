<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductList;
use App\Models\ProList;


class ProductListController extends Controller
{
    //
   public function index(){
        $Product = ProductList::orderBy('id', 'asc')->get();
        return $Product;

   }
   // Combox to select a product type
   public function initem(){
    $ProList = ProList::orderBy('id', 'asc')->get();
        return $ProList;
        
   }
   
    public function add(Request $request){
        try {

            $ProductList = new ProductList ([
            'name' => $request->name,
            'image' => $request->image,
            'amount' => $request->amount,
            'price_buy' => $request->price_buy,
            'price_sell' => $request->price_sell,
            'protype_id' => "1",
            

            ]);
            $ProductList->save();
            


            $success = true;
            $message = 'ບັນທຶກສຳເລັດ!';
            

        } catch (\Illuminate\Database\QueryException $ex) {
            //throw $th;
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];
        
        return response()->json($response);
        }
}