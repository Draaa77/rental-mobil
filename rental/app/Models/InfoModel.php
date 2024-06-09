<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoModel extends Model
{
    use HasFactory;
    protected $table        = "info_pinjam";
    protected $primaryKey   = "id_info";
    protected $fillable     = ['id_info', 'id_mobil', 'id_peminjam'];

    public function peminjam()
    {
        return $this->belongsTo('App\Models\PeminjamModel', 'id_peminjam');
    }

    public function mobil()
    {
        return $this->belongsTo('App\Models\MobilModel', 'id_mobil');
    }
}
