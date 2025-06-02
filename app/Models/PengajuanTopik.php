<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanTopik extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_topik';
    protected $fillable = ['judul', 'kode_dosen', 'dosen', 'nim', 'nama' ,'status'];
}
