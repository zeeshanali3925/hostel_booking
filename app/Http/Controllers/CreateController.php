<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateAccount extends Controller
{
    public function index(){
        return view("create-account");
    }
}