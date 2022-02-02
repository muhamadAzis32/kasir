<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "produk";
    protected $primaryKey = "id";
    protected $fillable = ["produk","harga","kategori_id"];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
