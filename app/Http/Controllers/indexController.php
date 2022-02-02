<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function layout(){
        return view("layout");
    }

    public function index(){
        return view("index");
    }
}
