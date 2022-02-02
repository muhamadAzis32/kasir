<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    //Tampilan
    public function viewProduk()
    {
        $produk = Produk::all();
        return view("produk.view-produk", ['data' => $produk]);
    }

    //input data
    public function inputProduk(){
        $kategori = Kategori::all();
        return view("produk.input-produk", ['data'=>$kategori]);
    }
    //Input data
    public function saveProduk(Request $x){
        //Validasi
        $messages = [
            'produk.required' => 'Tidak boleh kosong!',
            'harga.required' => 'Tidak boleh kosong!',
            'kategori_id.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'produk' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
        ], $messages);

        Produk::create([
            'produk' => $x->produk,
            'harga' => $x->harga,
            'kategori_id' => $x->kategori_id,
        ]);
        return redirect('/produk');
    }  


    //Edit data
    public function edit($id){
        $kategori = Kategori::all();
        $produk = Produk::find($id);
        return view("produk.edit-produk", ['data' => $produk], ['kategori'=>$kategori]);
    }
    public function updateProduk($id, Request $x){
        //Validasi
        $messages = [
            'produk.required' => 'Tidak boleh kosong!',
            'harga.required' => 'Tidak boleh kosong!',
            'kategori_id.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'produk' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
        ], $messages);

        Produk::where("id", "$id")->update([
            'produk' => $x->produk,
            'harga' => $x->harga,
            'kategori_id' => $x->kategori_id,
        ]);
        return redirect('/produk');
    }
    
    //Menghapus data
    public function hapusProduk($id){
        try {
            Produk::where('id', $id)->delete();
            return redirect('/produk');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/produk');
        }
    }


}
