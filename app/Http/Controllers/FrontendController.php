<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $user = User::all();

        return view('welcome',['user'=>$user]);
    }
}
