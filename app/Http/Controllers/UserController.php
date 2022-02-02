<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function indexLogin()
    {
        return view("login");
    }
    
    //Tampilan User
    public function viewUser(){
        $user = User::all();
        return view("user.view-user", ['data'=>$user]);
    }    

    //Input user
    public function inputUser(){
        return view("user.input-user");
    }
    public function saveUser(Request $x)
    {        
        //Validasi
        $messages = [
            'nama.required' => 'Tidak boleh kosong!',
            'email.required' => 'Tidak boleh kosong!',
            'level.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'nama' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|min:4|max:100',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        $file = $x->file('file');
        if (empty($file)) {
            User::create([
                'nama' => $x->nama,
                'email' => $x->email,
                'password' => bcrypt($x['password']),
                'level' => $x->level,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            User::create([
                'nama' => $x->nama,
                'email' => $x->email,
                'password' => bcrypt($x['password']),
                'level' => $x->level,
                'file' => $pathPublic,
            ]);
        }
        return redirect('/user');
    }

    //edit data user
    public function editUser($id)
    {
        $dataUser = User::find($id);
        return view("user.edit-user", ['data' => $dataUser]);
    }
    public function updateUser($id, Request $x)
    {

        $file = $x->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;

            //delete
            $data = User::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        User::where("id", "$id")->update([
            'nama' => $x->nama,
            'email' => $x->email,
            'level' => $x->level,
            'file' => $path,
        ]);
        return redirect('/user');
    }

    public function hapusUser($id)
    {
        try {
            $data = User::where('id', $id)->first();
            File::delete($data->file);
            User::where('id', $id)->delete();
            return redirect('/user');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user');
        }
    }
  
}
