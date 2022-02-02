<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //Tampilan
    public function viewTransaksi()
    {
        $transaksi = Transaksi::all();
        return view("transaksi.view-transaksi", ['data' => $transaksi]);
    }
}
