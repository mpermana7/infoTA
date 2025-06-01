<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPembimbing extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_pembimbing';
    protected $fillable = ['judul', 'nim', 'nama', 'dosen', 'kode_dosen', 'posisi', 'status'];
}
