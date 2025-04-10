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
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: #881d1d;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon">
                        <img class="img-fluid" src="{{ asset('/storage/assets/img/Logo/Logo%20White%20(1000%20x%201000%20piksel).png') }}" width="100px">
                    </div>
                </a>

                <hr class="sidebar-divider my-0">

                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/beranda">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="p/admin/template_dokumen">
                            <i class="far fa-newspaper"></i>
                            <span>Template Dokumen</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link active" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <i class="fas fa-users"></i>
                            <span>Kelola Pengguna</span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/dosen">
                                <i class="fas fa-chalkboard-teacher"></i>&nbsp;Dosen
                            </a>
                            <a class="dropdown-item" href="/admin/mahasiswa">
                                <i class="fas fa-user-graduate"></i>&nbsp;Mahasiswa
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <hr>
                        <a class="nav-link" href="/admin/profil">
                            <i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>

                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="badge bg-danger badge-counter">3+</span>
                                        <i class="fas fa-bell fa-fw"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span>
                                        <span class="badge rounded-pill me-2" style="background: #881d1d;">Admin</span>
                                        <img class="border rounded-circle img-profile" src="{{ asset('/storage/assets/img/avatars/avatar1.jpeg') }}">
                                    </a>

                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="/admin/profil">
                                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profil
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Keluar
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Mahasiswa</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <p class="text-dark m-0 fw-bold">Data Mahasiswa</p>
                            <button class="btn btn-sm link-light" type="button" style="background: #881d1d;" data-bs-toggle="modal" data-bs-target="#ModalTambahMahasiswa">
                                <i class="fas fa-plus"></i>&nbsp;Tambah Mahasiswa
                            </button>
                            <div class="modal fade" role="dialog" tabindex="-1" id="ModalTambahMahasiswa">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Tambah Mahasiswa</h5>
                                                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="form-label text-dark" style="font-weight: bold;">Foto :</label>
                                                <input class="form-control form-control-sm" type="file" name="foto" required="" accept="image/*">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">NIM :</label>
                                                <input class="form-control form-control-sm" type="number" name="nim" min="0" placeholder="Nomor Induk Mahasiswa" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Nama :</label>
                                                <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Kelas :</label>
                                                <input class="form-control form-control-sm" type="text" name="kelas" placeholder="Kelas" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Program Studi :</label>
                                                <input class="form-control form-control-sm" type="text" name="program_studi" placeholder="Program Studi" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label>
                                                <input class="form-control form-control-sm" type="text" name="fakultas" placeholder="Fakultas" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Angkatan :</label>
                                                <input class="form-control form-control-sm" type="text" name="angkatan" placeholder="Angkatan" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Email :</label>
                                                <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">No HP :</label>
                                                <input class="form-control form-control-sm" type="text" name="no_hp" placeholder="No Handphone" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Nama Pengguna :</label>
                                                <input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required="">
                                                <label class="form-label text-dark mt-3" style="font-weight: bold;">Kata Sandi :</label>
                                                <input class="form-control form-control-sm" type="password" name="kata_sandi" placeholder="Kata Sandi" required="" minlength="8">
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
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Program Studi</th>
                                            <th>Fakultas</th>
                                            <th>Angkatan</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Username</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img class="rounded-circle img-fluid" src="{{ asset('/storage/assets/img/avatars/avatar3.jpeg') }}" width="60px">
                                            </td>
                                            <td>34765123</td>
                                            <td>Shin Tae-yong</td>
                                            <td>TK-42-01</td>
                                            <td>S1 Teknik Komputer</td>
                                            <td>Teknik Elektro</td>
                                            <td>2022</td>
                                            <td>shintae@student.telkomuniversity.ac.id</td>
                                            <td>08122057xxx</td>
                                            <td>shin77</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditDosenPembimbing">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalHapusDosenPembimbing">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalLihatDosenPembimbing">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalEditDosenPembimbing">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="font-weight: bold;">Edit Mahasiswa</h5>
                                                                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-center">
                                                                        <img class="rounded-circle img-fluid" src="{{ asset('/storage/assets/img/avatars/avatar3.jpeg') }}" width="120px">
                                                                    </p>
                                                                    <label class="form-label text-dark" style="font-weight: bold;">Foto :</label>
                                                                    <input class="form-control form-control-sm" type="file" name="foto" required="" accept="image/*">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">NIM :</label>
                                                                    <input class="form-control form-control-sm" type="number" name="nim" min="0" placeholder="Nomor Induk Mahasiswa" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Nama :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Kelas :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="kelas" placeholder="Kelas" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Program Studi :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="program_studi" placeholder="Program Studi" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Fakultas :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="fakultas" placeholder="Fakultas" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Angkatan :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="angkatan" placeholder="Angkatan" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Email :</label>
                                                                    <input class="form-control" type="email" name="email" placeholder="Email" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">No HP :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="no_hp" placeholder="No Handphone" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Nama Pengguna :</label>
                                                                    <input class="form-control form-control-sm" type="text" name="nama_pengguna" placeholder="Nama Pengguna" required="">
                                                                    <label class="form-label text-dark mt-3" style="font-weight: bold;">Kata Sandi :</label>
                                                                    <input class="form-control form-control-sm" type="password" name="kata_sandi" placeholder="Kata Sandi" required="" minlength="8">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-sm" type="reset">
                                                                        <i class="fa fa-refresh"></i>&nbsp;Bersihkan
                                                                    </button>
                                                                    <button class="btn btn-warning btn-sm" type="submit" style="font-weight: bold;">
                                                                        <i class="fa fa-save"></i>&nbsp;Perbarui
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalHapusDosenPembimbing">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Hapus Mahasiswa</h5>
                                                                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h1 class="display-3">
                                                                    <i class="fas fa-exclamation-triangle"></i>
                                                                </h1>
                                                                <h6>Apakah anda yakin ingin menghapusnya?</h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">
                                                                    <i class="fa fa-close"></i>&nbsp;Tidak
                                                                </button>
                                                                <button class="btn btn-danger btn-sm" type="button">
                                                                    <i class="far fa-trash-alt"></i>&nbsp;Ya, Hapus
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalLihatDosenPembimbing">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Lihat Mahasiswa</h5>
                                                                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1 class="display-3 text-center">
                                                                    <img class="rounded-circle img-fluid" src="{{ asset('/storage/assets/img/avatars/avatar3.jpeg') }}" width="120px">
                                                                </h1>
                                                                <h5 class="mt-4" style="font-weight: bold;">Biodata</h5>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">NIM :</span>
                                                                        <p>12378123</p>
                                                                    </div>
                                                                    <div class="col-4"><span style="font-weight: bold;">Nama :</span>
                                                                        <p>Shin Tae-yong</p>
                                                                    </div>
                                                                    <div class="col-4"><span style="font-weight: bold;">Kelas :</span>
                                                                        <p>TK-42-01</p>
                                                                    </div>
                                                                    <div class="col-4"><span style="font-weight: bold;">Program Studi :</span>
                                                                        <p>S1 Teknik Komputer</p>
                                                                    </div>
                                                                    <div class="col-4"><span style="font-weight: bold;">Fakultas :</span>
                                                                        <p>Teknik Elektro</p>
                                                                    </div>
                                                                    <div class="col-4"><span style="font-weight: bold;">Angkatan :</span>
                                                                        <p>2022</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-9"><span style="font-weight: bold;">Email :</span>
                                                                        <p>shintaeyong@dosen.telkomuniversity.ac.id</p>
                                                                    </div>
                                                                    <div class="col-3"><span style="font-weight: bold;">No HP :</span>
                                                                        <p>0812342xxx</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-11">
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <h5 class="mt-4" style="font-weight: bold;">Akun</h5>
                                                                <div class="row">
                                                                    <div class="col-6"><span style="font-weight: bold;">Nama Pengguna :</span>
                                                                        <p>shin77</p>
                                                                    </div>
                                                                    <div class="col-6"><span style="font-weight: bold;">Kata Sandi :</span>
                                                                        <p>************</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">
                                                                    <i class="fa fa-close"></i>&nbsp;Tutup
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>No</strong></td>
                                            <td><strong>Foto</strong></td>
                                            <td><strong>NIM</strong></td>
                                            <td><strong>Nama</strong></td>
                                            <td><strong>Kelas</strong></td>
                                            <td><strong>Program Studi</strong></td>
                                            <td><strong>Fakultas</strong></td>
                                            <td><strong>Angkatan</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td><strong>No HP</strong></td>
                                            <td><strong>Username</strong></td>
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
</body>

</html>