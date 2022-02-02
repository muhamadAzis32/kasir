<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //Tampilan
    public function viewMember(){
        $member = Member::all();
        return view("member.view-member", ['data'=>$member]);
    }    

    //input data
    public function inputMember(){
        return view("member.input-member");
    }
    //Input data
    public function saveMember(Request $x){
        //Validasi
        $messages = [
            'nama.required' => 'Tidak boleh kosong!',
            'alamat.required' => 'Tidak boleh kosong!',
            'telepon.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ], $messages);

        Member::create([
            'nama' => $x->nama,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
        ]);
        return redirect('/member');
    }

    //Edit data
    public function edit($id){
        $member = Member::find($id);
        return view("member.edit-member", ['data'=>$member]);
    }
    public function updateMember($id, Request $x){
        //Validasi
        $messages = [
            'nama.required' => 'Tidak boleh kosong!',
            'alamat.required' => 'Tidak boleh kosong!',
            'telepon.required' => 'Tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ], $messages);

        Member::where("id", "$id")->update([
            'nama' => $x->nama,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
        ]);
        return redirect('/member');
    }

    //Menghapus data
    public function hapusMember($id){
        try {
            Member::where('id', $id)->delete();
            return redirect('/member');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member');
        }
    }

}
