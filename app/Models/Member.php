<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "member";
    protected $primaryKey = "id";
    protected $fillable = ["nama","alamat","telepon"];
}
