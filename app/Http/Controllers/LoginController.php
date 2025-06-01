<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'nama_pengguna' => 'required|string',
            'kata_sandi' => 'required|string|min:8',
        ],[
            'nama_pengguna.required' => 'Nama Pengguna Wajib Diisi!.',
            'kata_sandi.required' => 'Kata Sandi Wajib Diisi!.',
            'kata_sandi.min' => 'Kata Sandi Minimal 8 Karakter',
        ]);

        $nama_pengguna = $request->nama_pengguna;
        $kata_sandi = $request->kata_sandi;

        // Cek Admin
        $admin = Admin::where('nama_pengguna', $nama_pengguna)->first();
        if ($admin && Hash::check($kata_sandi, $admin->kata_sandi)) {
            Auth::guard('admin')->login($admin);
            return redirect()->intended('/admin/beranda');
        }

        // Cek Mahasiswa
        $mahasiswa = Mahasiswa::where('nama_pengguna', $nama_pengguna)->first();
        if ($mahasiswa && Hash::check($kata_sandi, $mahasiswa->kata_sandi)) {
            Auth::guard('mahasiswa')->login($mahasiswa);
            if ($mahasiswa->wajib_ganti_kata_sandi == 1) {
                return redirect('/buat_kata_sandi');
            }
            return redirect()->intended('/mahasiswa/beranda');
        }

        // Cek Dosen
        $dosen = Dosen::where('nama_pengguna', $nama_pengguna)->first();
        if ($dosen && Hash::check($kata_sandi, $dosen->kata_sandi)) {
            Auth::guard('dosen')->login($dosen);
            if ($dosen->wajib_ganti_kata_sandi == 1) {
                return redirect('/buat_kata_sandi');
            }
            return redirect()->intended('/dosen/beranda');
        }

        // Gagal Login
        return back()->withErrors([
            'login' => 'Nama Pengguna dan Kata Sandi Salah!,',
            'login2' => ' Silahkan Ulangi Lagi.'
        ])->withInput();
    }

    public function BuatKataSandiBaru(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'kata_sandi_baru' => 'required|min:8',
            'konfirmasi_kata_sandi' => 'required|same:kata_sandi_baru'
        ],[
            'kata_sandi_baru.required' => 'Kata Sandi Baru Wajib Diisi!',
            'kata_sandi_baru.min' => 'Kata Sandi Baru Minimal 8 Karakter',
            'konfirmasi_kata_sandi.required' => 'Konfirmasi Kata Sandi Wajib Diisi!',
            'konfirmasi_kata_sandi.same' => 'Konfirmasi Kata Sandi Harus Sama Dengan Kata Sandi Baru',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Get Akun by Role On Login
        if (auth()->guard('dosen')->check()) {
            // Get Dosen By ID
            $getDosen = auth()->guard('dosen')->user()->id;
            $dosen = Dosen::findOrFail($getDosen);

            // Cek Apakah Kata Sandi Baru Sama Dengan Yang Lama
            if (Hash::check($request->input('kata_sandi_baru'), $dosen->kata_sandi)) {
                return back()->withErrors(['kata_sandi_baru' => 'Kata Sandi Baru Harus Berbeda Dengan Kata Sandi Saat Ini!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
            }

            // Perbarui Kata Sandi
            $dosen->update([
                'kata_sandi' => Hash::make($request->input('kata_sandi_baru')),
                'wajib_ganti_kata_sandi' => 0,
            ]);

            return redirect('/dosen/beranda')->with(['success' => 'Kata Sandi Berhasil Diperbarui!']);
        } else {
            // Get Mahasiswa By ID
            $getMahasiswa = auth()->guard('mahasiswa')->user()->id;
            $mahasiswa = Mahasiswa::findOrFail($getMahasiswa);

            // Cek Apakah Kata Sandi Baru Sama Dengan Yang Lama
            if (Hash::check($request->input('kata_sandi_baru'), $mahasiswa->kata_sandi)) {
                return back()->withErrors(['kata_sandi_baru' => 'Kata Sandi Baru Harus Berbeda Dengan Kata Sandi Saat Ini!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
            }

            // Perbarui Kata Sandi
            $mahasiswa->update([
                'kata_sandi' => Hash::make($request->input('kata_sandi_baru')),
                'wajib_ganti_kata_sandi' => 0,
            ]);

            return redirect('/mahasiswa/beranda')->with(['success' => 'Kata Sandi Berhasil Diperbarui!']);
        }
    }

    public function logout(Request $request) {
        foreach (['admin', 'mahasiswa', 'dosen'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }
        return redirect('/login');
    }
}
