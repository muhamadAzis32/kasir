<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function layout(){
        return view("layout");
    }

    public function index(){
        $produk = Produk::count();
        $member = Member::count();
        $user = User::count();
        $data = [$produk,$member,$user];
        return view("index", ['data'=>$data]);
    }
}
