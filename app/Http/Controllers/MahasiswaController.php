<?php

namespace App\Http\Controllers;

use App\Models\DaftarTopik;
use App\Models\Dosen;
use App\Models\Kelompok;
use App\Models\Mahasiswa;
use App\Models\PengajuanPembimbing;
use App\Models\PengajuanTopik;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan Form Data Kelompok Yang Sudah Ada
     */
    public function dataMahasiswa() : View {
        $prodi = auth()->guard('mahasiswa')->user()->program_studi;
        $dataMahasiswa = Mahasiswa::where('program_studi', $prodi)->get();
        return view('mahasiswa.kelompok', compact('dataMahasiswa'));
    }

    /**
     * Menampilkan Data Daftar Topik
     */
    public function MenampilkanDataDaftarTopik() : View {
        $prodi = auth()->guard('mahasiswa')->user()->program_studi;
        $menampilkanDataDaftarTopik = DaftarTopik::where('program_studi', $prodi)->get();

        $nim = auth()->guard('mahasiswa')->user()->nim;
        $pengajuan_topik = PengajuanTopik::where('nim', $nim)->first();

        if(!empty($pengajuan_topik)) {
        $judul = $pengajuan_topik->judul;
        $data_topik = DaftarTopik::where('judul', $judul)->first();
        $data_kelompok = Kelompok::where('judul', $judul)->get();
        $data_pembimbing_dua = PengajuanPembimbing::where('judul', $judul)->first();
        $dosen = $data_topik->dosen;
        $data_dosen_pbb2 = Dosen::where('nama', '!=', $dosen)->get(); 
        return view('mahasiswa.daftar_topik', compact('menampilkanDataDaftarTopik', 'pengajuan_topik','data_topik','data_kelompok', 'data_pembimbing_dua', 'data_dosen_pbb2'));
        }

        return view('mahasiswa.daftar_topik', compact('menampilkanDataDaftarTopik'));
    }

    /**
     * Mahasiswa Pilih Topik
     */
    public function PilihTopik($id) : RedirectResponse {
        // Get Topik by ID
        $data_topik = DaftarTopik::find($id);
        $judul = $data_topik->judul;
        $nim = auth()->guard('mahasiswa')->user()->nim;
        $nama = auth()->guard('mahasiswa')->user()->nama;
        $status = 'Menunggu Persetujuan';

        // Simpan Data ke Pengajuan Topik
        PengajuanTopik::create([
            'judul' => $judul,
            'nim' => $nim,
            'nama' => $nama,
            'status' => $status,
        ]);

        // Redirect ke Halaman Daftar Topik
        return redirect('mahasiswa/daftar_topik')->with(['success' => 'Berhasil Menambahkan Topik']);
    }

    /**
     * Pilih Pembimbing 2
     */
    public function PilihPbb2(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'dosen' => 'required',
        ],[
            'dosen.required' => 'Pilih Pembimbing Dua Wajib Diisi!',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Pilih Pembimbing Dua!']);
        }

        $nim = auth()->guard('mahasiswa')->user()->nim;
        $nama = auth()->guard('mahasiswa')->user()->nama;
        $pengajuan_topik = PengajuanTopik::where('nim', $nim)->first();
        $judul = $pengajuan_topik->judul;
        $dosen = $request->dosen;
        $get_dosen = Dosen::where('nama', $dosen)->first();
        $kode_dosen = $get_dosen->kode_dosen;

        // Simpan Data
        PengajuanPembimbing::create([
            'judul' => $judul,
            'nim' => $nim,
            'nama' => $nama,
            'dosen' => $dosen,
            'kode_dosen' => $kode_dosen,
            'posisi' => 'Pembimbing Dua',
            'status' => 'Menunggu Persetujuan',
        ]);

        return redirect('mahasiswa/daftar_topik')->with(['success' => 'Berhasil Pilih Pembimbing Dua']);
    }
}
