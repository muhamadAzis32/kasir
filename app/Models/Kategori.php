<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "kategori";
    protected $primaryKey = "id";
    protected $fillable = ["nmKategori"];

    public function produk(){
        return $this->hasMany(produk::class,'kategori_id');
    }

}
