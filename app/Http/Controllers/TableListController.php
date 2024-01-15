<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableList;


class TableListController extends Controller
{
    //
     public function index(){
        // $table = TableList::orderBy('id', 'asc')->get();
        // return $table;
        $sort = \Request::get('sort');
        $perpage = \Request::get('perpage');
        $search = \Request::get('search');

        

        $table = TableList::orderBy('id', $sort)
        ->where(
            function($query) use ($search){
                $query->where('name','LIKE',"%{$search}%");
                
            }
        )
        ->paginate($perpage)
        ->toArray();
        
        return array_reverse($table);

     }
     
     public function edit($id){
        $table = TableList::find($id);
        return $table;
     }
        public function add(Request $request){
        try {

            $table = new TableList([
            'name' => $request->name,
            'status' => "ວ່າງ",

            ]);
            $table->save();
            


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
            
            $table = TableList::find($id);

            $table->update([
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
            
            $table = TableList::find($id);
            $table->delete();
           

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