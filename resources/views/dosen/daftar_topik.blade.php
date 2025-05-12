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
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: #881d1d;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><img class="img-fluid" src="{{ asset('/storage/assets/img/Logo/Logo%20White%20(1000%20x%201000%20piksel).png') }}" width="100px"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="/dosen/beranda"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/dosen/daftar_topik"><i class="far fa-file-alt"></i><span>Daftar Topik</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen/template_laporan"><i class="fas fa-file-word"></i><span>Template Laporan</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen/dokumen_cd"><i class="fas fa-file-word"></i><span>Dokumen Capstone Design</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen/progres_ta"><i class="fas fa-chart-line"></i><span>Progres Tugas Akhir</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/dosen/penilaian_mahasiswa"><i class="fas fa-pencil-alt"></i><span>Penilaian Mahasiswa</span></a></li>
                    <li class="nav-item">
                        <hr><a class="nav-link" href="/dosen/profil"><i class="fas fa-user"></i><span>Profil</span></a>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::guard('dosen')->user()->nama_pengguna }}</span><span class="badge rounded-pill me-2" style="background: #881d1d;">Dosen</span><img class="border rounded-circle img-profile" src="{{ asset('/storage/assets/img/avatars/'.(Auth::guard('dosen')->user()->foto ?? 'default.jpg')) }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="/dosen/profil"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profil</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Keluar</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Daftar Topik</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <p class="text-dark m-0 fw-bold">Data Daftar Topik</p><button class="btn btn-sm link-light" type="button" style="background: #881d1d;" data-bs-toggle="modal" data-bs-target="#ModalTambahDaftarTopik"><i class="fas fa-plus"></i>&nbsp;Tambah Daftar Topik</button>
                            <div class="modal fade" role="dialog" tabindex="-1" id="ModalTambahDaftarTopik">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Tambah Daftar Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body"><label class="form-label text-dark" style="font-weight: bold;">Judul :</label><input class="form-control form-control-sm" type="text" name="judul" placeholder="Judul Topik" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Jurusan :</label><input class="form-control form-control-sm" type="text" name="kode_dosen" placeholder="Kode Dosen" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label><input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Bidang :</label><input class="form-control" type="email" name="email" placeholder="Email" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Kuota :</label><input class="form-control form-control-sm" type="number" name="kuota" placeholder="Kuota"><label class="form-label text-dark mt-3" style="font-weight: bold;">Dosen :</label><input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Status :</label><input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Deskripsi :</label><textarea class="form-control form-control-sm" name="deskripsi" rows="5" placeholder="Deskripsi Tentang Topik..."></textarea></div>
                                            <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-refresh"></i>&nbsp;Bersihkan</button><button class="btn btn-sm link-light" type="submit" style="background: #881d1d;"><i class="fa fa-save"></i>&nbsp;Simpan</button></div>
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
                                            <th>Kode Dosen</th>
                                            <th>Kuota</th>
                                            <th>Bidang</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Budidaya Ikan Air Tawar</td>
                                            <td>STY</td>
                                            <td>3 Orang</td>
                                            <td><span class="badge bg-dark me-1">Internet Of Things</span><span class="badge bg-dark me-1">Artificial Intelligence</span></td>
                                            <td><span class="badge rounded-pill bg-success">Tersedia</span></td>
                                            <td><button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditDaftarTopik"><i class="fas fa-edit"></i></button><button class="btn btn-danger btn-sm ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalHapusDaftarTopik"><i class="fas fa-trash-alt"></i></button><button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalLihatDaftarTopik"><i class="fas fa-eye"></i></button>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalEditDaftarTopik">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="font-weight: bold;">Edit Daftar Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body"><label class="form-label text-dark" style="font-weight: bold;">Judul :</label><input class="form-control form-control-sm" type="text" name="judul" placeholder="Judul Topik" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Jurusan :</label><input class="form-control form-control-sm" type="text" name="kode_dosen" placeholder="Kode Dosen" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label><input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Bidang :</label><input class="form-control" type="email" name="email" placeholder="Email" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Kuota :</label><input class="form-control form-control-sm" type="number" name="kuota" placeholder="Kuota"><label class="form-label text-dark mt-3" style="font-weight: bold;">Dosen :</label><input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Status :</label><input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required=""><label class="form-label text-dark mt-3" style="font-weight: bold;">Deskripsi :</label><textarea class="form-control form-control-sm" name="deskripsi" rows="5" placeholder="Deskripsi Tentang Topik..."></textarea></div>
                                                                <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-refresh"></i>&nbsp;Bersihkan</button><button class="btn btn-warning btn-sm" type="submit" style="font-weight: bold;"><i class="fa fa-save"></i>&nbsp;Perbarui</button></div>
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
                                                                    <div class="col-4"><span style="font-weight: bold;">Dosen</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>Shin Tae Yong</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kode Dosen</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>STY</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Status</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span><span class="badge rounded-pill bg-success">Tersedia</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kelompok</span></div>
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
                                            </td>
                                        </tr>
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

        // Form Select Fakultas dan Program Studi
        const data = {
            "Fakultas Teknik Elektro (FTE)": ["S1 Teknik Elektro", "S1 Teknik Telekomunikasi", "S1 Teknik Fisika", "S1 Teknik Komputer", "S1 Teknik Biomedis", "S1 Teknik Sistem Energi", "S1 Teknik Telekomunikasi (Jakarta)", "S2 Teknik Elektro", "S3 Teknik Elektro"],
            "Fakultas Rekayasa Industri (FRI)": ["S1 Teknik Industri", "S1 Sistem Informasi", "S1 Teknik Logistik", "S1 Manajemen Rekayasa", "S1 Sistem Informasi (Jakarta)", "S2 Teknik Industri", "S2 Sistem Informasi"],
            "Fakultas Informatika (FIF)": ["S1 Informatika", "S1 Teknologi Informasi", "S1 Informatika PJJ", "S1 Sains Data", "S1 Rekayasa Perangkat Lunak", "S1 Teknologi Informasi (Jakarta)", "S2 Informatika", "S2 Ilmu Forensik", "S3 Informatika"],
            "Fakultas Ekonomi dan Bisnis (FEB)": ["S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)", "S1 Akuntansi", "S1 Leisure Management", "S1 Administrasi Bisnis", "S1 Bisnis Digital", "S2 Manajemen", "S2 Manajemen PJJ", "S2 Administrasi Bisnis"],
            "Fakultas Komunikasi dan Ilmu Sosial (FKI)": ["S1 Ilmu Komunikasi", "S1 Hubungan Masyarakat", "S1 Digital Content Brodcating", "S1 Psikologi", "S2 Ilmu Komunikasi"],
            "Fakultas Industri Kreatif (FIK)": ["S1 Desain Komunikasi Visual", "S1 Desian Produk", "S1 Desain Interior", "S1 Seni Rupa", "S1 Kriya", "S1 Film dan Animasi", "S1 Desain Komunikasi Visual (Jakarta)", "S2 Desain"],
            "Fakultas Ilmu Terapan (FIT)": ["D3 Teknik Telekomunikasi", "D3 Rekayasa Perangkat Lunak Aplikasi", "D3 Sistem Informasi", "D3 Sistem Informasi Akuntansi", "D3 Teknologi Komputer", "D3 Digital Marketing", "D3 Hospitality & Culinary Art", "D3 Teknik Telekomunikasi (Jakarat)", "S1 Terapan Digital Creative Multimedia", "S1 Terapan Sistem Informasi Kota Cerdas"]
        };
    
        function updateProgramStudi(id_mahasiswa) {
            const fakultas = document.getElementById('fakultas' + id_mahasiswa).value;
            const programStudiSelect = document.getElementById('program_studi' + id_mahasiswa);
            const oldProgramStudi = '{{ old("program_studi", $data->program_studi ?? "")}}';
    
            // Kosongkan pilihan sebelumnya
            programStudiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';
    
            if (data[fakultas]) {
                data[fakultas].forEach(function(prodi) {
                    const option = document.createElement('option');
                    option.value = prodi;
                    option.text = prodi;
                    // Set selected jika sama dengan old value
                    if (prodi === oldProgramStudi) {
                        option.selected = true;
                    }
                    programStudiSelect.add(option);
                });
            }

            // // Jika fakultas dipilih, isi dropdown
            // if (fakultas && data[fakultas]) {
            //     data[fakultas].forEach(prodi => {
            //         const option = new Option(prodi, prodi);
            //         option.selected = (prodi === oldProgramStudi);
            //         programStudiSelect.add(option);
            //     });
            // }
        }


// Panggil fungsi saat halaman selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Jika fakultas sudah dipilih (saat edit data), update program studi
    if (document.getElementById('fakultas').value) {
        updateProgramStudi(id_mahasiswa);
    }
    
    // Juga panggil saat ada perubahan fakultas
    document.getElementById('fakultas').addEventListener('change', updateProgramStudi);
});

        const dataP = {
            "Fakultas Teknik Elektro (FTE)": ["S1 Teknik Elektro", "S1 Teknik Telekomunikasi", "S1 Teknik Fisika", "S1 Teknik Komputer", "S1 Teknik Biomedis", "S1 Teknik Sistem Energi", "S1 Teknik Telekomunikasi (Jakarta)", "S2 Teknik Elektro", "S3 Teknik Elektro"],
            "Fakultas Rekayasa Industri (FRI)": ["S1 Teknik Industri", "S1 Sistem Informasi", "S1 Teknik Logistik", "S1 Manajemen Rekayasa", "S1 Sistem Informasi (Jakarta)", "S2 Teknik Industri", "S2 Sistem Informasi"],
            "Fakultas Informatika (FIF)": ["S1 Informatika", "S1 Teknologi Informasi", "S1 Informatika PJJ", "S1 Sains Data", "S1 Rekayasa Perangkat Lunak", "S1 Teknologi Informasi (Jakarta)", "S2 Informatika", "S2 Ilmu Forensik", "S3 Informatika"],
            "Fakultas Ekonomi dan Bisnis (FEB)": ["S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)", "S1 Akuntansi", "S1 Leisure Management", "S1 Administrasi Bisnis", "S1 Bisnis Digital", "S2 Manajemen", "S2 Manajemen PJJ", "S2 Administrasi Bisnis"],
            "Fakultas Komunikasi dan Ilmu Sosial (FKI)": ["S1 Ilmu Komunikasi", "S1 Hubungan Masyarakat", "S1 Digital Content Brodcating", "S1 Psikologi", "S2 Ilmu Komunikasi"],
            "Fakultas Industri Kreatif (FIK)": ["S1 Desain Komunikasi Visual", "S1 Desian Produk", "S1 Desain Interior", "S1 Seni Rupa", "S1 Kriya", "S1 Film dan Animasi", "S1 Desain Komunikasi Visual (Jakarta)", "S2 Desain"],
            "Fakultas Ilmu Terapan (FIT)": ["D3 Teknik Telekomunikasi", "D3 Rekayasa Perangkat Lunak Aplikasi", "D3 Sistem Informasi", "D3 Sistem Informasi Akuntansi", "D3 Teknologi Komputer", "D3 Digital Marketing", "D3 Hospitality & Culinary Art", "D3 Teknik Telekomunikasi (Jakarat)", "S1 Terapan Digital Creative Multimedia", "S1 Terapan Sistem Informasi Kota Cerdas"]
        };

        function updateProgramStudiP() {
            const fakultasP = document.getElementById('fakultasP').value;
            const programStudiSelectP = document.getElementById('program_studiP');
    
            // Kosongkan pilihan sebelumnya
            programStudiSelectP.innerHTML = '<option selected>-- Pilih Program Studi --</option>';
    
            if (dataP[fakultasP]) {
                dataP[fakultasP].forEach(function(prodi) {
                    const option = document.createElement('option');
                    option.value = prodi;
                    option.text = prodi;
                    programStudiSelectP.add(option);
                });
            }
        }
    </script>
</body>
</html>