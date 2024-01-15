<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProList;

class ProListController extends Controller
{
    //
  
    public function index(){
        // $table = TableList::orderBy('id', 'asc')->get();
        // return $table;
        $sort = \Request::get('sort');
        $perpage = \Request::get('perpage');
        $search = \Request::get('search');

        

        $ProList = ProList::orderBy('id', $sort)
        ->where(
            function($query) use ($search){
                $query->where('name','LIKE',"%{$search}%");
                
            }
        )
        ->paginate($perpage)
        ->toArray();
        
        return array_reverse($ProList);

     }
     
     public function edit($id){
        $table = ProList::find($id);
        return $table;
     }
        public function add(Request $request){
        try {

            $ProList = new ProList([
            'name' => $request->name,
            

            ]);
            $ProList->save();
            


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
        
        public function update(Request $request, $id){
        try {
            
            $ProList = ProList::find($id);

            $ProList->update([
                'name' => $request->name,
             
            ]);


          
            $success = true;
            $message = 'ອັບເດດສຳເລັດ!';
            

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

        public function delete($id){
        try {
            
            $ProList = ProList::find($id);
            $ProList->delete();
           

            $success = true;
            $message = 'ລຶບສຳເລັດ!';
            

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