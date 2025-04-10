<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $fillable = ['nama_pengguna', 'kata_sandi', 'role'];
    protected $hidden = ['kata_sandi'];

    public function getAuthPassword() {
        return $this->kata_sandi;
    }
}
