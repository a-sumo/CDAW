<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class userController extends Controller
{
    // Fetch all users from user model
    public function getUserList(){
        $users =  DB::table('users')->get();
        return View::make('stats', compact('users'));
    }

}
