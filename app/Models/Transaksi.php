<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "transaksis";
    protected $primaryKey = "id";
    protected $fillable = ["bayar","jumlah","total","produk_id","member_id"];

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
