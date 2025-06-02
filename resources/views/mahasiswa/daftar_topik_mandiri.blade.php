<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="{{ asset('/storage/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('/storage/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
/* Samakan tampilan select2 dengan Bootstrap form-control */
.select2-container--default .select2-selection--single,
.select2-container--default .select2-selection--multiple {
    border: 1px solid #ced4da; /* Bootstrap default border */
    border-radius: 0.375rem;    /* Bootstrap border radius */
    height: auto;               /* Untuk menyesuaikan tinggi dinamis */
    font-size: 0.8475rem;       /* Ukuran font opsional */
}

/* Hover & focus state agar seperti input Bootstrap */
.select2-container--default .select2-selection--single:focus,
.select2-container--default .select2-selection--multiple:focus,
.select2-container--default .select2-selection--single:hover,
.select2-container--default .select2-selection--multiple:hover {
    border-color: #afb2b8;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Bootstrap's focus effect */
}

/* Ukuran font dropdown list */
.select2-results__option {
    font-size: 0.9375rem;
}

/* Ukuran font pada tag item yang dipilih (multiple mode) */
.select2-selection__choice {
    font-size: 0.875rem;
}
</style>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: #881d1d;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><img class="img-fluid" src="{{ asset('/storage/assets/img/Logo/Logo%20White%20(1000%20x%201000%20piksel).png') }}" width="100px"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/beranda"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/daftar_topik"><i class="far fa-file-alt"></i><span>Daftar Topik</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/mahasiswa/daftar_topik_mandiri"><i class="far fa-file-alt"></i><span>Daftar Topik Mandiri</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/template_laporan"><i class="fas fa-file-word"></i><span>Template Laporan</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/dokumen_cd"><i class="fas fa-file-word"></i><span>Dokumen Capstone Design</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/kelompok"><i class="fas fa-users"></i><span>Kelompok</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/pengajuan_bimbingan"><i class="fas fa-comments"></i><span>Pengajuan Bimbingan</span></a></li>
                    <li class="nav-item">
                        <hr><a class="nav-link" href="/mahasiswa/profil"><i class="fas fa-user"></i><span>Profil</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::guard('mahasiswa')->user()->nama_pengguna }}</span><span class="badge rounded-pill me-2" style="background: #881d1d;">Mahasiswa</span><img class="border rounded-circle img-profile" src="{{ asset('/storage/assets/img/avatars/'.(Auth::guard('mahasiswa')->user()->foto ?? 'default.jpg')) }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="/mahasiswa/profil"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profil</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Keluar</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Daftar Topik Mandiri</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <p class="text-dark m-0 fw-bold">Data Daftar Topik Mandiri</p>
                            <button class="btn btn-sm link-light" type="button" style="background: #881d1d;" data-bs-toggle="modal" data-bs-target="#ModalTambahDaftarTopikMandiri">
                                <i class="fas fa-plus"></i>&nbsp;Tambah Daftar Topik Mandiri
                            </button>

                            <div class="modal fade" role="dialog" tabindex="-1" id="ModalTambahDaftarTopikMandiri">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Tambah Daftar Topik</h5>
                                                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <label class="form-label text-dark" style="font-weight: bold;">Judul :</label>
                                                <input class="form-control form-control-sm" type="text" name="judul" placeholder="Judul Topik" required="">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Jurusan :</label>
                                                <input class="form-control form-control-sm" type="text" name="kode_dosen" placeholder="Kode Dosen" required="">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label>
                                                <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required="">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Bidang :</label>
                                                <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Kuota :</label>
                                                <input class="form-control form-control-sm" type="number" name="kuota" placeholder="Kuota">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Kelompok :</label>
                                                <input class="form-control form-control-sm" type="text" name="kelompok" placeholder="kelompok" required="">
                                                
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Deskripsi :</label>
                                                <textarea class="form-control form-control-sm" name="deskripsi" rows="5" placeholder="Deskripsi Tentang Topik..."></textarea>
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-sm" type="reset">
                                                    <i class="fa fa-refresh"></i>&nbsp;Bersihkan
                                                </button>
                                                <button class="btn btn-sm link-light" type="submit" style="background: #881d1d;">
                                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-striped table-hover" id="tableData">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kelompok</th>
                                            <th>Kuota</th>
                                            <th>Bidang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menampilkanDataDaftarTopikMandiriMahasiswa as $data)
                                        <tr>
                                            <td>1</td>
                                            <td>Budidaya Ikan Air Tawar</td>
                                            <td>
                                                <span class="badge bg-dark me-1">1103228233 - Mochamad Permana Ash Shidiq</span>
                                                <span class="badge bg-dark me-1">1103228233 - Eka Milenia Ramadhani</span>
                                            </td>
                                            <td>3 Orang</td>
                                            <td>
                                                <span class="badge bg-dark me-1">Internet Of Things</span>
                                                <span class="badge bg-dark me-1">Artificial Intelligence</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditDaftarTopik">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalHapusDaftarTopik">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalLihatDaftarTopik">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-success btn-sm link-light me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalPilihPembimbing">
                                                    <i class="fas fa-plus"></i>
                                                </button>

                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalEditDaftarTopik">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Tambah Daftar Topik</h5>
                                                                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <label class="form-label text-dark" style="font-weight: bold;">Judul :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="judul" placeholder="Judul Topik" required="">

                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Jurusan :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="kode_dosen" placeholder="Kode Dosen" required="">

                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required="">
                                                                    
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Bidang :</label>
                                                                    <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                                                    
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Kuota :</label>
                                                                    <input class="form-control form-control-sm" type="number" name="kuota" placeholder="Kuota">
                                                                    
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Kelompok :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="kelompok" placeholder="kelompok" required="">
                                                                    
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Deskripsi :</label>
                                                                    <textarea class="form-control form-control-sm" name="deskripsi" rows="5" placeholder="Deskripsi Tentang Topik..."></textarea>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-sm" type="reset">
                                                                        <i class="fa fa-refresh"></i>&nbsp;Bersihkan
                                                                    </button>
                                                                    <button class="btn btn-sm link-light" type="submit" style="background: #881d1d;">
                                                                        <i class="fa fa-save"></i>&nbsp;Simpan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalHapusDaftarTopik">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Hapus Daftar Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h1 class="display-3"><i class="fas fa-exclamation-triangle"></i></h1>
                                                                <h6>Apakah anda yakin ingin menghapusnya?</h6>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Tidak</button><button class="btn btn-danger btn-sm" type="button"><i class="far fa-trash-alt"></i>&nbsp;Ya, Hapus</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalLihatDaftarTopik">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Lihat Daftar Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Judul</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>Budidaya Ikan Air Tawar</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Jurusan</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>S1 Teknik Komputer</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Fakultas</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>Fakultas Tenik Elektro</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Bidang</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span><span class="badge bg-dark me-1">Internet Of Things</span><span class="badge bg-dark me-1">Artificial Intelligence</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kuota</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>3 Orang</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kelompok</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>-</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Pembimbing 1</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>-</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Pembimbing 2</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>-</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Deskripsi</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>Capstone yang berfokus pada pembuatan alat budidaya ikan air tawar</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Tutup</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalPilihPembimbing">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Pilih Pembimbing</h5>
                                                                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <label class="form-label text-dark" style="font-weight: bold;">Pembimbing 1 :</label>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="">-- Pembimbing 1 --</option>
                                                                    </select>
                                                                    
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Pembimbing 2 :</label>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="">-- Pembimbing 2 --</option>
                                                                    </select>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-sm" type="reset">
                                                                        <i class="fa fa-refresh"></i>&nbsp;Bersihkan
                                                                    </button>
                                                                    <button class="btn btn-sm link-light" type="submit" style="background: #881d1d;">
                                                                        <i class="fa fa-save"></i>&nbsp;Simpan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>No</strong></td>
                                            <td><strong>Judul</strong></td>
                                            <td><strong>Kode Dosen</strong></td>
                                            <td><strong>Kuota</strong></td>
                                            <td><strong>Bidang</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Aksi</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © infoTA 2025</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
   <script src="{{ asset('/storage/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
        // Tooltips (inisialisasi untuk semua .tooltip-btn)
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('.tooltip-btn'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Datatables
        $(document).ready( function () {
            $('#tableData').DataTable({
                language: {
                    lengthMenu: "Tampilkan _MENU_ entri per halaman",
                    search: "Cari:",
                    info: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Entri",
                    infoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Entri",
                    emptyTable: "Tidak Ada Data Tersedia",
                    zeroRecords: "Tidak Ditemukan Hasil",
                },
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
                columnDefs: [{
                    targets: 6,
                    searchable: false,
                    orderable: false,
                },{
                    targets: 0,
                    searchable: false,
                }],
                layout: {
                    topEnd: {
                        search: {
                            placeholder: 'Cari Data Anda...'
                        }
                    }
                }
            });
        });
    $(document).ready(function() {
        $('#bidang').select2({
            placeholder: "-- Pilih Bidang --",
            dropdownParent: $('#ModalTambahDaftarTopik'),
            width: '100%'
        });
    });

$(document).ready(function() {
    // Fungsi untuk inisialisasi Select2 pada modal tertentu
    function initSelect2ForModal(modalId) {
        $(modalId).on('shown.bs.modal', function() {
            // Cari select bidang dalam modal ini
            var select = $('.bidang-select', this);
            
            // Inisialisasi Select2
            select.select2({
                placeholder: "-- Pilih Bidang --",
                dropdownParent: $(this), // Mengarah ke modal yang sedang aktif
                width: '100%'
            });
        });

        // Hancurkan Select2 saat modal ditutup
        $(modalId).on('hidden.bs.modal', function() {
            $('.bidang-select', this).select2('destroy');
        });
    }

    // Inisialisasi untuk semua modal yang ada
    @foreach($modalTopik as $data)
        initSelect2ForModal('#ModalEditDaftarTopik{{ $data->id }}');
    @endforeach
});
    </script>
</body>

</html>