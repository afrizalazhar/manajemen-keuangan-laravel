<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    public $table = "tabel_pemasukan";
    protected $fillable = ["jenis_pemasukan", "jumlah", "user_id"];
    
}
