<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama_pengguna', 'kata_sandi', 'role'];
    protected $hidden = ['kata_sandi'];

    public function getAuthPassword() {
        return $this->kata_sandi;
    }
}
