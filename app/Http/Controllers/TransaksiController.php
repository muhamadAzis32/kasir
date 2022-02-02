<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class TransaksiController extends Controller
{
    //Tampilan
    public function viewTransaksi()
    {
        $transaksi = Transaksi::all();
        return view("transaksi.view-transaksi", ['data' => $transaksi]);
    }

    //proses transaksi
    public function inputTransaksi(){
        $produk = Produk::all();
        $member = Member::all();

        return view("transaksi.input-transaksi", ['member'=>$member],['produk'=>$produk] );
    }

    //Input data
    
    public function saveTransaksi(Request $x){
        
        //Validasi
        $messages = [
            'produk_id.required' => 'Tidak boleh kosong!',
            'jumlah.required' => 'Tidak boleh kosong!',
            'bayar.required' => 'Tidak boleh kosong!',
            'member_id.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'member_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'bayar' => 'required',
        ], $messages);
        Transaksi::create([
            'member_id' => $x->member_id,
            'produk_id' => $x->produk_id,
            'jumlah' => $x->jumlah,
            'bayar' => $x->bayar,
            'total' => $x->jumlah * 100,
        ]);
        return redirect('/transaksi');
    }  
    

}
