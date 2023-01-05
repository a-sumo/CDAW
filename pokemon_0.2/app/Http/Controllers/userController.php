<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserList(){
        $users =  DB::table('users')->get();
        return view('stats', array('users' => $users));
    }

}
