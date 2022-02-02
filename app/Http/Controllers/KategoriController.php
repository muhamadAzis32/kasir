<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //Tampilan tabel
    public function viewKategori(){
        $kategori = Kategori::all();
        return view("kategori.view-kategori", ['data'=>$kategori]);
    }

    //Input data
    public function saveKategori(Request $x){
        //Validasi
        $messages = [
            'nmKategori.required' => 'tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'nmKategori' => 'required',
        ], $messages);

        Kategori::create([
            'nmKategori' => $x->nmKategori
        ]);
        return redirect('/kategori');
    }

    //Edit data
    public function edit($id){
        $kategori = Kategori::find($id);
        return view("kategori.edit-kategori", ['data'=>$kategori]);
    }
    public function updateKategori($id, Request $x){

        //Validasi
        $messages = [
            'nmKategori.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'nmKategori' => 'required',
        ], $messages);

        Kategori::where("id", "$id")->update([
            'nmKategori' => $x->nmKategori
        ]);
        return redirect('/kategori');
    }


    //Menghapus data
    public function hapusKategori($id){
        try {
            Kategori::where('id', $id)->delete();
            return redirect('/kategori');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori');
        }
    }
}
