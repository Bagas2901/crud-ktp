<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //index login
    public function index()
    {
        //call view
        return view('login');
    }
}
