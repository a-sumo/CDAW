<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function listApi(){
        return response()->json(Pokemon::all());
    }

    public function createApi(Request $request){
        $name = $request->input('name');
        // $date = $request->input('date');
    
        if($name){
          $pokemon = new Pokemon();
          $pokemon->name = $name;
          $pokemon->save();
          return response()->json(["status" => "success"]);
        }else{
          return response()->json(["status" => "error"]);
        }
      }
      public function deleteApi($id){
        $pokemon= Pokemon::find($id);
        if($pokemon){
            $pokemon->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    
    
    
    
}
