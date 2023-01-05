<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Pokemon;
use App\Models\User;

class PokemonController extends Controller
{
    public function listApi(){
        return response()->json(Pokemon::where('user_id', Auth::id())->get());
    }

    public function createApi(Request $request){
        $name = $request->input('name');
        $user = Auth::user();
        $user_id = Auth::id();

        if($name){
          if (!Pokemon::where('name', $name)->exists()) {
            $pokemon = new Pokemon();
            $pokemon->name = $name;
            $pokemon->user_id = $user_id;
            $pokemon->save();
            return response()->json(["status" => "success"]);
         }
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
