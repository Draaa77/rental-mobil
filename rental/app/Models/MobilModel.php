<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilModel extends Model
{
    use HasFactory;
    protected $table        = "mobil";
    protected $primaryKey   = "id_mobil";
    protected $fillable     = ['id_mobil', 'nomor', 'jenis', 'warna'];
}
