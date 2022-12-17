<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Http;
use App\Models\Species;

class SpeciesController extends Controller
{
    public function listApi(){
        return response()->json(Species::all());
    }

    public function createApi(Request $request){
        $name = $request->input('name');
    
        if($name){
          $species = new Species();
          $species->name = $name;
          $species->save();
          return response()->json(["status" => "success"]);
        }else{
          return response()->json(["status" => "error"]);
        }
      }
      public function deleteApi($id){
        $species= Species::find($id);
        if($species){
            $species->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    
    
    
    
}
