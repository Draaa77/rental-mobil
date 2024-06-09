<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamModel extends Model
{
    use HasFactory;
    protected $table        = "peminjam";
    protected $primaryKey   = "id_peminjam";
    protected $fillable     = ['id_peminjam', 'nama', 'hp'];
}
