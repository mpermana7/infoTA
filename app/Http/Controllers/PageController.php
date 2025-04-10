<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/beranda');
        }
    
        if (Auth::guard('mahasiswa')->check()) {
            return redirect('/mahasiswa/beranda');
        }
    
        if (Auth::guard('dosen')->check()) {
            return redirect('/dosen/beranda');
        }
        return view('login');
    }

    public function berandaAdmin(){
        return view('admin.beranda');
    }

    public function templateDokumenAdmin(){
        return view('admin.template_dokumen');
    }

    public function mahasiswaAdmin(){
        return view('admin.mahasiswa');
    }

    public function dosenAdmin(){
        return view('admin.dosen');
    }

    public function profilAdmin(){
        return view('admin.profil');
    }
}
