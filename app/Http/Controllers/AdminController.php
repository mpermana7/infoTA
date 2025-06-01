<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Bidang;
use App\Models\Template;
use App\Models\Mahasiswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PenambahanTemplateDokumen;
use DateTime;

class AdminController extends Controller
{

    /**
     * Menampilkan Jumlah Data Mahasiswa
     */
    public function JumlahData() : View {
        $JumlahDataMahasiswa = Mahasiswa::count();
        $JumlahDataDosen = Dosen::count();
        return view('admin.beranda',compact('JumlahDataMahasiswa', 'JumlahDataDosen'));
    }

    /**
     * Menambahkan Data Dokumen Template
     */
    public function TambahDataDokumenTemplate(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'template_dokumen' => 'required|mimes:docx|max:16384',
        ],[
            'template_dokumen.required' => 'File Template Dokumen Wajib Diisi!',
            'template_dokumen.mimes' => 'Jenis File Template Dokumen Harus DOCX',
            'template_dokumen.max' => 'Ukuran File Template Dokumen Maksimal 16MB',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Upload File
        $file = $request->file('template_dokumen');
        $namaAsli = $file->getClientOriginalName();
        $file->storeAs('dokumen_template', $namaAsli);

    // Cek apakah nama file sudah ada di database
    if (Template::where('template_dokumen', $namaAsli)->exists()) {
        return back()->withErrors(['template_dokumen' => 'Nama File Tidak Boleh Sama Dengan Yang Sudah Diunggah.'])->with(['error' => 'Gagal Menambahkan Data!']);
    }

        // Create Data Template Dokumen
        $template = Template::create([
            'template_dokumen' => $namaAsli,
        ]);

        $admin = auth()->guard('admin')->user();
        Admin::all()->each(fn($admin) => $admin->notify(new PenambahanTemplateDokumen($template)));
        
        // Redirect ke Halaman Template Dokumen
        return redirect('admin/template_dokumen')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan Data Dokumen Template
     */
    public function MenampilkanDataDokumenTemplate() : View {
        $menampilkanDataTemplateDokumen = Template::all();
        return view('admin.template_dokumen', compact('menampilkanDataTemplateDokumen'));
    }

    /**
     * Hapus Data Dokumen Template
     */
    public function HapusDataDokumenTemplate($id) : RedirectResponse {
        // Get Data Template by ID
        $template = Template::findOrFail($id);

        // Hapus File
        Storage::delete('dokumen_template/' . $template->template_dokumen);
        $template->delete();

        // Kembali ke Halaman template_dokumen
        return redirect('/admin/template_dokumen')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
    /**
     * Edit Data Dokumen Template
     */
    public function EditDataDokumenTemplate(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'template_dokumen_'.$id => 'required|mimes:docx|max:16384',
        ],[
            'template_dokumen_'.$id.'.required' => 'File Template Dokumen Wajib Diisi!',
            'template_dokumen_'.$id.'.mimes' => 'Jenis File Template Dokumen Harus DOCX',
            'template_dokumen_'.$id.'.max' => 'Ukuran File Template Dokumen Maksimal 16MB',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Diperbarui!']);
        }

        // Get Template by ID
        $template = Template::findOrFail($id);

        // Hapus File Jika File Perbarui
        Storage::delete('dokumen_template/' . $template->template_dokumen);

        // Upload File
        $file = $request->file('template_dokumen_'.$id);
        $namaAsli = $file->getClientOriginalName();
        $file->storeAs('dokumen_template', $namaAsli);
        
        // Cek apakah nama file sudah ada di database
        if (Template::where('template_dokumen', $namaAsli)->exists()) {
            return back()->withErrors(['template_dokumen_'.$id => 'Nama File Tidak Boleh Sama Dengan Yang Sudah Diunggah.'])->with(['error' => 'Gagal Diperbarui!']);
        }

        // Perbarui File
        $template->update([
            'template_dokumen' => $namaAsli,
        ]);

        // Redirect ke Template Dokumen
        return redirect('admin/template_dokumen')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Notifikasi Sudah Dibaca
     */
    public function SudahDibaca(Request $request) {
        $admin = auth()->guard('admin')->user();
        $admin->unreadNotifications->markAsRead();

        return back()->with(['success' => 'Notifikasi Sudah Dibaca Semua!']);
    }

    /**
     * Notifikasi Hapus Semua
     */
    public function HapusSemua(Request $request) {
        $admin = auth()->guard('admin')->user();
        $admin->notifications->each->delete();

        return back()->with(['success' => 'Notifikasi Berhasil Dihapus!']);
    }

    /**
     * Menambahkan Data Dosen Pembimbing
     */
    public function TambahDataDosen(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(),[
            'nip' => 'required|numeric|digits_between:8,20|unique:dosen,nip',
            'kode_dosen' => 'required|regex:/^[A-Za-z]+$/|max:3|unique:dosen,kode_dosen',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:dosen,email',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:dosen,no_hp',
            'nama_pengguna' => 'required|regex:/^[A-Za-z0-9]+$/|min:5|max:50|unique:dosen,nama_pengguna',
            'kata_sandi' => 'required|string|min:8',
        ],[
            'nip.required' => 'NIP Wajib Diisi!',
            'nip.digits_between' => 'NIP Minimal Harus 8 Sampai 20 Digit',
            'nip.unique' => 'NIP Sudah Terpakai, Silahkan Coba Lagi!',
            'kode_dosen.required' => 'Kode Dosen Wajib Diisi!',
            'kode_dosen.regex' => 'Kode Dosen Harus Berjenis Huruf Saja',
            'kode_dosen.max' => 'Kode Dosen Harus 3 Digit Huruf',
            'kode_dosen.unique' => 'Kode Dosen Sudah Terpakai, Silahkan Coba Lagi!',
            'nama.required' => 'Nama Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'email.unique' => 'Email Sudah Terpakai, Silahkan Coba Lagi!',
            'no_hp.required' => 'No Handphone Wajib Diisi!',
            'no_hp.digits_between' => 'No Handphone Minimal 10 Digit Sampai 15 Digit',
            'no_hp.unique' => 'No Handphone Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_pengguna.required' => 'Nama Pengguna Wajib Diisi!',
            'nama_pengguna.min' => 'Nama Pengguna Minimal 5 Karakter',
            'nama_pengguna.max' => 'Nama Pengguna Maksimal 50 Karakter',
            'nama_pengguna.regex' => 'Nama Pengguna Haya Boleh Mengandung Huruf dan Angka',
            'nama_pengguna.unique' => 'Nama Pengguna Sudah Terpakai, Silahkan Coba Lagi!',
            'kata_sandi.required' => 'Kata Sandi Wajib Diisi!',
            'kata_sandi.min' => 'Kata Sandi Minimal 8 Karakter',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Cek apakah nama Pengguna sudah ada di database
        if (Admin::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Mahasiswa::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Dosen::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Simpan Data Dosen
        $dosen = Dosen::create([
            'foto' => null,
            'nip' => $request->nip,
            'kode_dosen' => $request->kode_dosen,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_pengguna' => $request->nama_pengguna,
            'kata_sandi' => Hash::make($request->kata_sandi),
            'role' => 'dosen',
            'wajib_ganti_kata_sandi' => '0',
        ]);

        // Redirect ke Halaman Dosen
        return redirect('admin/dosen')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan Data Dosen
     */
    public function MenampilkanDataDosen() : View {
        $menampilkanDataDosen = Dosen::all();
        return view('admin.dosen', compact('menampilkanDataDosen'));
    }

    /**
     * Edit Data Dosen
     */
    public function EditDataDosen(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'nip_'.$id => 'required|numeric|digits_between:8,20|unique:dosen,nip,'.$id.',id',
            'kode_dosen_'.$id => 'required|regex:/^[A-Za-z]+$/|max:3|unique:dosen,kode_dosen,'.$id.',id',
            'nama_'.$id => 'required|string|max:255',
            'email_'.$id => 'required|email|max:255|unique:dosen,email,'.$id.',id',
            'no_hp_'.$id => 'required|numeric|digits_between:10,15|unique:dosen,no_hp,'.$id.',id',
            'nama_pengguna_'.$id => 'required|regex:/^[A-Za-z0-9]+$/|min:5|max:50|unique:dosen,nama_pengguna,'.$id.',id',
        ],[
            'nip_'.$id.'.required' => 'NIP Wajib Diisi!',
            'nip_'.$id.'.digits_between' => 'NIP Minimal Harus 8 Sampai 20 Digit',
            'nip_'.$id.'.unique' => 'NIP Sudah Terpakai, Silahkan Coba Lagi!',
            'kode_dosen_'.$id.'.required' => 'Kode Dosen Wajib Diisi!',
            'kode_dosen_'.$id.'.regex' => 'Kode Dosen Harus Berjenis Huruf Saja',
            'kode_dosen_'.$id.'.max' => 'Kode Dosen Harus 3 Digit Huruf',
            'kode_dosen_'.$id.'.unique' => 'Kode Dosen Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_'.$id.'.required' => 'Nama Wajib Diisi!',
            'email_'.$id.'.required' => 'Email Wajib Diisi!',
            'email_'.$id.'.unique' => 'Email Sudah Terpakai, Silahkan Coba Lagi!',
            'no_hp_'.$id.'.required' => 'No Handphone Wajib Diisi!',
            'no_hp_'.$id.'.digits_between' => 'No Handphone Minimal 10 Digit Sampai 15 Digit',
            'no_hp_'.$id.'.unique' => 'No Handphone Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_pengguna_'.$id.'.required' => 'Nama Pengguna Wajib Diisi!',
            'nama_pengguna_'.$id.'.min' => 'Nama Pengguna Minimal 5 Karakter',
            'nama_pengguna_'.$id.'.max' => 'Nama Pengguna Maksimal 50 Karakter',
            'nama_pengguna_'.$id.'.regex' => 'Nama Pengguna Haya Boleh Mengandung Huruf dan Angka',
            'nama_pengguna_'.$id.'.unique' => 'Nama Pengguna Sudah Terpakai, Silahkan Coba Lagi!',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Diperbarui!']);
        }

        // Cek apakah nama Pengguna sudah ada di database
        if (Admin::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Mahasiswa::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Dosen::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Get Dosen by ID
        $dosen = Dosen::findOrFail($id);

        // Perbarui Data Dosen
        $dosen->update([
            'nip' => $request->input('nip_'.$id),
            'kode_dosen' => $request->input('kode_dosen_'.$id),
            'nama' => $request->input('nama_'.$id),
            'email' => $request->input('email_'.$id),
            'no_hp' => $request->input('no_hp_'.$id),
            'nama_pengguna' => $request->input('nama_pengguna_'.$id),
        ]);

        // Redirect ke Halaman Dosen
        return redirect('/admin/dosen')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Hapus Data Dosen
     */
    public function HapusDataDosen($id) : RedirectResponse {
        // Get Dosen by ID
        $dosen = Dosen::findOrFail($id);

        // Hapus Data Dosen
        $dosen->delete();

        // Kembali ke Halaman Dosen
        return redirect('/admin/dosen')->with(['success' => 'Data Behasil Dihapus!']);
    }

    /**
     * Ganti Kata Sandi Dosen
     */
    public function GantiKataSandiDosen(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'kata_sandi_baru_'.$id => 'required|min:8',
            'konfirmasi_kata_sandi_'.$id => 'required|same:kata_sandi_baru_'.$id,
        ],[
            'kata_sandi_baru_'.$id.'.required' => 'Kata Sandi Baru Wajib Diisi!',
            'kata_sandi_baru_'.$id.'.min' => 'Kata Sandi Baru Minimal 8 Karakter',
            'konfirmasi_kata_sandi_'.$id.'.required' => 'Konfirmasi Kata Sandi Wajib Diisi!',
            'konfirmasi_kata_sandi_'.$id.'.same' => 'Konfirmasi Kata Sandi Harus Sama Dengan Kata Sandi Baru',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Get Dosen by ID
        $dosen = Dosen::findOrFail($id);

        // Cek Apakah Kata Sandi Baru Sama Dengan Yang Lama
        if (Hash::check($request->input('kata_sandi_baru_'.$id), $dosen->kata_sandi)) {
            return back()->withErrors(['kata_sandi_baru_'.$id => 'Kata Sandi Baru Harus Berbeda Dengan Kata Sandi Saat Ini!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Perbarui Kata Sandi
        $dosen->update([
            'kata_sandi' => Hash::make($request->input('kata_sandi_baru_'.$id))
        ]);

        return redirect('/admin/dosen')->with(['success' => 'Kata Sandi Berhasil Diperbarui']);
    }

    /**
     * Menambahkan Data Mahasiswa
     */

     public function TambahDataMahasiswa(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'nim' => 'required|numeric|digits_between:8,12|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'kelas' => 'required',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|max:255|unique:mahasiswa,email',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:mahasiswa,no_hp',
            'nama_pengguna' => 'required|regex:/^[A-Za-z0-9]+$/|min:5|max:50|unique:mahasiswa,nama_pengguna',
            'kata_sandi' => 'required|string|min:8',
        ],[
            'nim.required' => 'NIM Wajib Diisi!',
            'nim.digits_between' => 'NIM Minimal Harus 8 Sampai 12 Digit',
            'nim.unique' => 'NIM Sudah Terpakai, Silahkan Coba Lagi!',
            'nama.required' => 'Nama Wajib Diisi!',
            'kelas.required' => 'Kelas Wajib Diisi!',
            'program_studi.required' => 'Program Studi Wajib Diisi!',
            'fakultas.required' => 'Fakultas Wajib Diisi!',
            'angkatan.required' => 'Angkatan Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'email.unique' => 'Email Sudah Terpakai, Silahkan Coba Lagi!',
            'no_hp.required' => 'No Handphone Wajib Diisi!',
            'no_hp.digits_between' => 'No Handphone Minimal 10 Digit Sampai 15 Digit',
            'no_hp.unique' => 'No Handphone Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_pengguna.required' => 'Nama Pengguna Wajib Diisi!',
            'nama_pengguna.min' => 'Nama Pengguna Minimal 5 Karakter',
            'nama_pengguna.max' => 'Nama Pengguna Maksimal 50 Karakter',
            'nama_pengguna.regex' => 'Nama Pengguna Haya Boleh Mengandung Huruf dan Angka',
            'nama_pengguna.unique' => 'Nama Pengguna Sudah Terpakai, Silahkan Coba Lagi!',
            'kata_sandi.required' => 'Kata Sandi Wajib Diisi!',
            'kata_sandi.min' => 'Kata Sandi Minimal 8 Karakter',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Cek apakah nama Pengguna sudah ada di database
        if (Admin::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Mahasiswa::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Dosen::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Simpan Data Mahasiswa
        $mahasiswa = Mahasiswa::create([
            'foto' => null,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'program_studi' => $request->program_studi,
            'fakultas' => $request->fakultas,
            'angkatan' => $request->angkatan,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_pengguna' => $request->nama_pengguna,
            'kata_sandi' => Hash::make($request->kata_sandi),
            'role' => 'mahasiswa',
            'wajib_ganti_kata_sandi' => '0',
        ]);

        return redirect('admin/mahasiswa')->with(['success' => 'Data Berhasil Disimpan!']);
     }

     /**
      * Menampilkan Data Mahasiswa
      */
      public function MenampilkanDataMahasiswa() : View {
        $menampilkanDataMahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa', compact('menampilkanDataMahasiswa'));
      }

      /**
       * Edit Data Mahasiswa
       */
      public function EditDataMahasiswa(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'nim_'.$id => 'required|numeric|digits_between:8,12|unique:mahasiswa,nim,'.$id.',id',
            'nama_'.$id => 'required|string|max:255',
            'kelas_'.$id => 'required',
            'program_studi_'.$id => 'required',
            'fakultas_'.$id => 'required',
            'angkatan_'.$id => 'required',
            'email_'.$id => 'required|email|max:255|unique:mahasiswa,email,'.$id.',id',
            'no_hp_'.$id => 'required|numeric|digits_between:10,15|unique:mahasiswa,no_hp,'.$id.',id',
            'nama_pengguna_'.$id => 'required|regex:/^[A-Za-z0-9]+$/|min:5|max:50|unique:mahasiswa,nama_pengguna,'.$id.',id',
        ],[
            'nim_'.$id.'.required' => 'NIM Wajib Diisi!',
            'nim_'.$id.'.digits_between' => 'NIM Minimal Harus 8 Sampai 12 Digit',
            'nim_'.$id.'.unique' => 'NIM Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_'.$id.'.required' => 'Nama Wajib Diisi!',
            'kelas_'.$id.'.required' => 'Kelas Wajib Diisi!',
            'program_studi_'.$id.'.required' => 'Program Studi Wajib Diisi!',
            'fakultas_'.$id.'.required' => 'Fakultas Wajib Diisi!',
            'angkatan_'.$id.'.required' => 'Angkatan Wajib Diisi!',
            'email_'.$id.'.required' => 'Email Wajib Diisi!',
            'email_'.$id.'.unique' => 'Email Sudah Terpakai, Silahkan Coba Lagi!',
            'no_hp_'.$id.'.required' => 'No Handphone Wajib Diisi!',
            'no_hp_'.$id.'.digits_between' => 'No Handphone Minimal 10 Digit Sampai 15 Digit',
            'no_hp_'.$id.'.unique' => 'No Handphone Sudah Terpakai, Silahkan Coba Lagi!',
            'nama_pengguna_'.$id.'.required' => 'Nama Pengguna Wajib Diisi!',
            'nama_pengguna_'.$id.'.min' => 'Nama Pengguna Minimal 5 Karakter',
            'nama_pengguna_'.$id.'.max' => 'Nama Pengguna Maksimal 50 Karakter',
            'nama_pengguna_'.$id.'.regex' => 'Nama Pengguna Haya Boleh Mengandung Huruf dan Angka',
            'nama_pengguna_'.$id.'.unique' => 'Nama Pengguna Sudah Terpakai, Silahkan Coba Lagi!',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Cek apakah nama Pengguna sudah ada di database
        if (Admin::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Mahasiswa::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }
        if (Dosen::where('nama_pengguna', $request->nama_pengguna)->exists()) {
            return back()->withErrors(['nama_pengguna_'.$id => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Get Dosen by ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Perbarui Data Dosen
        $mahasiswa->update([
            'nim' => $request->input('nim_'.$id),
            'nama' => $request->input('nama_'.$id),
            'kelas' => $request->input('kelas_'.$id),
            'program_studi' => $request->input('program_studi_'.$id),
            'fakultas' => $request->input('fakultas_'.$id),
            'angkatan' => $request->input('angkatan_'.$id),
            'email' => $request->input('email_'.$id),
            'no_hp' => $request->input('no_hp_'.$id),
            'nama_pengguna' => $request->input('nama_pengguna_'.$id),
        ]);

        // Redirect ke Halaman Mahasiswa
        return redirect('/admin/mahasiswa')->with(['success' => 'Data Berhasil Diperbarui!']);
      }

      /**
       * Hapus Data Mahasiswa
       */
      public function HapusDataMahasiswa($id) : RedirectResponse {
        // Get Mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus Data Mahasiswa
        $mahasiswa->delete();

        // Kembali ke Halaman Mahasiswa
        return redirect('/admin/mahasiswa')->with(['success' => 'Data Behasil Dihapus!']);
    }

        /**
     * Ganti Kata Sandi Mahasiswa
     */
    public function GantiKataSandiMahasiswa(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'kata_sandi_baru_'.$id => 'required|min:8',
            'konfirmasi_kata_sandi_'.$id => 'required|same:kata_sandi_baru_'.$id,
        ],[
            'kata_sandi_baru_'.$id.'.required' => 'Kata Sandi Baru Wajib Diisi!',
            'kata_sandi_baru_'.$id.'.min' => 'Kata Sandi Baru Minimal 8 Karakter',
            'konfirmasi_kata_sandi_'.$id.'.required' => 'Konfirmasi Kata Sandi Wajib Diisi!',
            'konfirmasi_kata_sandi_'.$id.'.same' => 'Konfirmasi Kata Sandi Harus Sama Dengan Kata Sandi Baru',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Get Mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Cek Apakah Kata Sandi Baru Sama Dengan Yang Lama
        if (Hash::check($request->input('kata_sandi_baru_'.$id), $mahasiswa->kata_sandi)) {
            return back()->withErrors(['kata_sandi_baru_'.$id => 'Kata Sandi Baru Harus Berbeda Dengan Kata Sandi Saat Ini!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Perbarui Kata Sandi
        $mahasiswa->update([
            'kata_sandi' => Hash::make($request->input('kata_sandi_baru_'.$id))
        ]);

        return redirect('/admin/mahasiswa')->with(['success' => 'Kata Sandi Berhasil Diperbarui']);
    }

    /**
     * Edit Foto Admin
     */
    public function EditFotoAdmin(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'image' => 'required|mimes:png,jpg,jpeg|max:16384',
        ],[
            'image.required' => 'Foto Wajib Diisi!',
            'image.mimes' => 'Jenis Foto Harus PNG, JPG, atau JPEG',
            'image.max' => 'Ukuran Foto Maksimal 16MB',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        //get Admin by ID
        $admin = Admin::findOrFail($id);

        // Upload Image
        $image = $request->file('image');
        $image->storeAs('assets/img/avatars/'. $image->hashName());

        // Hapus Foto Sebelumnya
        Storage::delete('assets/img/avatars/'.$admin->image);

        // Update Foto Admin
        $admin->update([
            'image' => $image->hashName()
        ]);

        return redirect('/admin/profil')->with(['success' => 'Foto Berhasil Diperbarui']);
    }

    /**
     * Ganti Kata Sandi Admin
     */
    public function GantiKataSandiAdmin(Request $request, $id) : RedirectResponse {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'kata_sandi_lama' => 'required|min:8',
            'kata_sandi_baru' => 'required|min:8|different:kata_sandi_lama',
            'konfirmasi_kata_sandi' => 'required|same:kata_sandi_baru',
        ], [
            'kata_sandi_lama.required' => 'Kata Sandi Lama Wajib Diisi!',
            'kata_sandi_lama.min' => 'Kata Sandi Lama Minimal 8 Karakter',
            'kata_sandi_baru.required' => 'Kata Sandi Baru Wajib Diisi!',
            'kata_sandi_baru.min' => 'Kata Sandi Baru Minimal 8 karakter',
            'kata_sandi_baru.different' => 'Kata Sandi Baru Harus Berbeda Dengan Yang Lama',
            'konfirmasi_kata_sandi.required' => 'Konfirmasi Kata Sandi Wajib Diisi!',
            'konfirmasi_kata_sandi.same' => 'Konfirmasi Kata Sandi Tidak Sama',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        //get Admin by ID
        $admin = Admin::findOrFail($id);

        // Cek Apakah Kata Sandi Baru Sama Dengan Yang Lama
        if (Hash::check($request->input('kata_sandi_baru'), $admin->kata_sandi)) {
            return back()->withErrors(['kata_sandi_baru' => 'Kata Sandi Baru Harus Berbeda Dengan Kata Sandi Saat Ini!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Verifikasi Kata Sandi Lama
        if (!Hash::check($request->kata_sandi_lama, $admin->kata_sandi)) {
            return back()->withErrors(['kata_sandi_lama' => 'Kata Sandi Lama Tidak Sesuai!'])->with(['error' => 'Kata Sandi Gagal Diperbarui!']);
        }

        // Perbarui Kata Sandi
        $admin->update([
            'kata_sandi' => Hash::make($request->kata_sandi_baru)
        ]);

        return redirect('/admin/profil')->with(['success' => 'Kata Sandi Berhasil Diperbarui']);
    }

    /**
     * Menambahkan Data Bidang
     */
    public function TambahDataBidang(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'bidang' => 'required|unique:daftar_bidang,bidang',
        ],[
            'bidang.required' => 'Bidang Wajib Diisi!',
            'bidang.unique' => 'Bidang Sudah Terdaftar, Coba Masukkan Bidang Lain!',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Simpan Data Bidang
        $bidang = Bidang::create([
            'bidang' => $request->bidang,
        ]);

        return redirect('admin/bidang_tugas_akhir')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan Data Bidang
     */
    public function MenampilkanDataBidang() : View {
        $menampilkanDataBidang = Bidang::all();
        return view('admin.bidang_tugas_akhir', compact('menampilkanDataBidang'));
    }

    /**
     * Edit Data Bidang
     */
    public function EditDataBidang(Request $request, $id) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'bidang_'.$id => 'required|unique:daftar_bidang,bidang,'.$id.',id',
        ],[
            'bidang_'.$id.'.required' => 'Bidang Wajib Diisi!',
            'bidang_'.$id.'.unique' => 'Bidang Sudah Terdaftar, Coba Masukkan Bidang Lain!',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Menambahkan Data!']);
        }

        // Get Bidang by ID
        $bidang = Bidang::findOrFail($id);

        // Perbarui Data Bidang
        $bidang->update([
            'bidang' => $request->input('bidang_'.$id),
        ]);

        return redirect('/admin/bidang_tugas_akhir')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Hapus Data Bidang
     */
    public function HapusDataBidang($id) : RedirectResponse {
        // Get Bidang by ID
        $bidang = Bidang::findOrFail($id);

        // Hapus Data Bidang
        $bidang->delete();

        return redirect('/admin/bidang_tugas_akhir')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Import Data Dosen
     */
    public function ImportDataDosen(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'file' => 'required|mimetypes:text/plain,text/csv,application/csv,application/vnd.ms-excel|max:21504',
        ],[
            'file.required' => 'File CSV Wajib Diisi!',
            'file.mimetypes' => 'Jenis File Harus CSV',
            'file.max' => 'Ukuran File Maksimal 21MB',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Import Data!']);
        }

        $file = fopen($request->file('file'), 'r');
        $BarisPertama = true;
        $MasukkanData = [];
        $csvNip = [];
        $csvNama = [];

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            if ($BarisPertama) {
                $BarisPertama = false;

                // Validasi Struktur Header
                $header = ['nip', 'nama'];
                $aktualheader = array_map('strtolower', array_map('trim', $row));

                if ($aktualheader !== $header) {
                    fclose($file);
                    return back()->with(['error' => 'Format CSV Tidak Sesuai Template!']);
                }
                
                continue;
            }

            $nip = trim($row[0] ?? '');
            $nama = trim($row[1] ?? '');

            // Skip Jika Kosong
            if (empty($nip) || empty($nama)) continue;

            // Cek duplikat dalam file CSV
            if (in_array($nip, $csvNip) && in_array($nama, $csvNama)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada Data Yang Duplikat']);
            }
            if (in_array($nip, $csvNip)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada NIP Yang Duplikat']);
            }
            if (in_array($nama, $csvNama)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada Nama Yang Duplikat']);
            }

            // Cek Duplikat di dalam Database
            $exists = DB::table('dosen')
                ->where('nip', $nip)
                ->orWhere('nama', $nama)
                ->exists();

            if ($exists) {
                return back()->with(['error' => 'Data $nip atau $nama Sudah Terdaftar']);
            }

            $csvNip[] = $nip;
            $csvNama[] = $nama;

            // Cek apakah nama Pengguna sudah ada di database
            if (Mahasiswa::where('nama_pengguna', $nip)->exists()) {
                return back()->withErrors(['file' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
            }

            $MasukkanData[] = [
                'foto' => null,
                'nip' => $nip,
                'kode_dosen' => null,
                'nama' => $nama,
                'email' => null,
                'no_hp' => null,
                'nama_pengguna' => $nip,
                'kata_sandi' => Hash::make($nip),
                'role' => 'dosen',
                'wajib_ganti_kata_sandi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        fclose($file);

        if (empty($MasukkanData)) {
            return back()->withErrors(['file' => 'File CSV Tidak Memiliki Data Dosen'])->with(['error' => 'Data File CSV Kosong!']);
        }

        if (!empty($MasukkanData)) {
            DB::table('dosen')->insert($MasukkanData);
        }

        return redirect('admin/dosen')->with(['success' => 'Data Dosen Berhasil Diimport!']);
    }

        /**
     * Import Data Mahasiswa
     */
    public function ImportDataMahasiswa(Request $request) : RedirectResponse {
        // Validasi Form
        $validasi = Validator::make($request->all(), [
            'file' => 'required|mimetypes:text/plain,text/csv,application/csv,application/vnd.ms-excel|max:21504',
        ],[
            'file.required' => 'File CSV Wajib Diisi!',
            'file.mimetypes' => 'Jenis File Harus CSV',
            'file.max' => 'Ukuran File Maksimal 21MB',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->with(['error' => 'Gagal Import Data!']);
        }

        $file = fopen($request->file('file'), 'r');
        $BarisPertama = true;
        $MasukkanData = [];
        $csvNim = [];
        $csvNama = [];

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            if ($BarisPertama) {
                $BarisPertama = false;

                // Validasi Struktur Header
                $header = ['nim', 'nama'];
                $aktualheader = array_map('strtolower', array_map('trim', $row));

                if ($aktualheader !== $header) {
                    fclose($file);
                    return back()->with(['error' => 'Format CSV Tidak Sesuai Template!']);
                }
                
                continue;
            }

            $nim = trim($row[0] ?? '');
            $nama = trim($row[1] ?? '');

            // Skip Jika Kosong
            if (empty($nim) || empty($nama)) continue;

            // Cek duplikat dalam file CSV
            if (in_array($nim, $csvNim) && in_array($nama, $csvNama)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada Data Yang Duplikat']);
            }
            if (in_array($nim, $csvNim)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada NIM Yang Duplikat']);
            }
            if (in_array($nama, $csvNama)) {
                return redirect()->back()->with(['error' => 'Didalam File Ada Nama Yang Duplikat']);
            }

            // Cek Duplikat di dalam Database
            $exists = DB::table('mahasiswa')
                ->where('nim', $nim)
                ->orWhere('nama', $nama)
                ->exists();

            if ($exists) {
                return back()->with(['error' => 'Data $nip atau $nama Sudah Terdaftar']);
            }

            $csvNim[] = $nim;
            $csvNama[] = $nama;

            // Cek apakah nama Pengguna sudah ada di database
            if (Dosen::where('nama_pengguna', $nim)->exists()) {
                return back()->withErrors(['file' => 'Nama Pengguna Sudah Ada, Silahkan Coba Lagi'])->with(['error' => 'Gagal Menambahkan Data!']);
            }

            $MasukkanData[] = [
                'foto' => null,
                'nim' => $nim,
                'nama' => $nama,
                'kelas' => null,
                'program_studi' => null,
                'fakultas' => null,
                'angkatan' => null,
                'email' => null,
                'no_hp' => null,
                'nama_pengguna' => $nim,
                'kata_sandi' => Hash::make($nim),
                'role' => 'mahasiswa',
                'wajib_ganti_kata_sandi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        fclose($file);

        if (empty($MasukkanData)) {
            return back()->withErrors(['file' => 'File CSV Tidak Memiliki Data Mahasiswa'])->with(['error' => 'Data File CSV Kosong!']);
        }

        if (!empty($MasukkanData)) {
            DB::table('mahasiswa')->insert($MasukkanData);
        }

        return redirect('admin/mahasiswa')->with(['success' => 'Data Mahasiswa Berhasil Diimport!']);
    }
}
