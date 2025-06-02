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

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark" style="background: #881d1d;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><img class="img-fluid" src="{{ asset('/storage/assets/img/Logo/Logo%20White%20(1000%20x%201000%20piksel).png') }}" width="100px"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/beranda"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/mahasiswa/daftar_topik"><i class="far fa-file-alt"></i><span>Daftar Topik</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/mahasiswa/template_laporan"><i class="fas fa-file-word"></i><span>Template Laporan</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/mahasiswa/dokumen_cd"><i class="fas fa-file-word"></i><span>Dokumen Capstone Design</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/kelompok"><i class="fas fa-users"></i><span>Kelompok</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/mahasiswa/pengajuan_bimbingan"><i class="fas fa-comments"></i><span>Pengajuan Bimbingan</span></a></li>
                    <li class="nav-item">
                        <hr><a class="nav-link disabled" href="/mahasiswa/profil"><i class="fas fa-user"></i><span>Profil</span></a>
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
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item disabled" href="/mahasiswa/profil"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profil</a>
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
                            <p class="text-dark m-0 fw-bold">Data Daftar Topik</p><button class="btn btn-sm link-light" type="button" style="background: #881d1d;" data-bs-toggle="modal" data-bs-target="#ModalDaftarTopikYangDipilih"><i class="fas fa-eye"></i>&nbsp;Daftar Topik Yang Dipilih</button>
                            <div class="modal fade" role="dialog" tabindex="-1" id="ModalDaftarTopikYangDipilih">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" style="color: var(--bs-emphasis-color);font-weight: bold;">Daftar Topik Yang Dipilih</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                        @if (!empty($pengajuan_topik) && ($pengajuan_topik->status !== 'Tidak Disetujui'))
                                            <div class="row">
                                                <div class="col-6"><span class="text-dark fw-bold">Judul</span></div>
                                                <div class="col-6">
                                                    <p class="text-dark"><span class="text-dark fw-bold">:</span>&nbsp;{{$pengajuan_topik->judul}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><span class="text-dark fw-bold">Kode Dosen</span></div>
                                                <div class="col-6">
                                                    <p class="text-dark"><span class="text-dark fw-bold">:</span>&nbsp;{{$data_topik->kode_dosen}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><span class="text-dark fw-bold">Dosen</span></div>
                                                <div class="col-6">
                                                    <p class="text-dark"><span class="text-dark fw-bold">:</span>&nbsp;{{$data_topik->dosen}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><span class="text-dark fw-bold">Kelompok</span></div>
                                                <div class="col-6">
                                                    <p class="text-dark">
                                                        <span class="text-dark fw-bold">:</span>&nbsp;
                                                        @php
                                                            $judul_kelompok = $data_kelompok->where('judul', $data_topik->judul);
                                                        @endphp
                                                        @forelse ($judul_kelompok as $kelompok)
                                                            <span class="badge rounded-pill bg-dark me-1 text-truncate w-75">{{$kelompok->nim}} - {{$kelompok->nama_anggota}}</span>
                                                        @empty
                                                            -
                                                        @endforelse
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><span class="text-dark fw-bold">Status</span></div>
                                                <div class="col-6">
                                                    <p class="text-dark">
                                                        <span class="text-dark fw-bold">:</span>&nbsp;
                                                        @if ($pengajuan_topik->status == 'Disetujui')
                                                            <span class="badge rounded-pill bg-success text-dark m-1">Disetujui</span>
                                                        @endif
                                                        @if ($pengajuan_topik->status == 'Tidak Disetujui')
                                                            <span class="badge rounded-pill bg-danger text-dark m-1">Tidak Disetujui</span>
                                                        @endif
                                                        @if ($pengajuan_topik->status == 'Menunggu Persetujuan')
                                                            <span class="badge rounded-pill bg-warning text-dark m-1">Menunggu Persetujuan</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            @if ($pengajuan_topik->status == 'Disetujui')
                                                @if (empty($data_pembimbing_dua))
                                                    <div class="row">
                                                        <div class="col-6"><span class="text-dark fw-bold">Pilih Pembimbing Dua</span></div>
                                                        <div class="col-6">
                                                            <form action="{{ route('mahasiswa.pilihPbb2') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <p class="text-dark d-flex">
                                                                    <span class="text-dark fw-bold">:</span>&nbsp;
                                                                    <select class="form-select form-select form-select-sm @error('dosen') is-invalid @enderror" name="dosen">
                                                                        <option value="">-- Pilih Pembimbing Dua --</option>
                                                                        @foreach ($data_dosen_pbb2 as $pbb2)
                                                                            <option value="{{$pbb2->nama}}">{{$pbb2->nama}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="d-grid">
                                                                    {{-- Pesan Error Untuk Pembimbing Dua --}}
                                                                    @error('dosen')
                                                                        <small class="fw-bold" style="color: #881d1d;">{{ $message }}</small>
                                                                    @enderror
                                                                    </div>
                                                                </p>
                                                                <p class="text-center">
                                                                    <button class="btn btn-sm" type="submit" style="background: #881d1d;color: rgb(255,255,255);font-weight: bold;">
                                                                        <i class="fas fa-mouse-pointer"></i>&nbsp;Pilih
                                                                    </button>
                                                                </p>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @elseif (!empty($data_pembimbing_dua) && ($data_pembimbing_dua->status == 'Disetujui') && ($data_pembimbing_dua->posisi == 'Pembimbing Dua'))
                                                    <div class="row">
                                                        <div class="col-4"><span class="text-dark fw-bold">Pembimbing Dua</span></div>
                                                        <div class="col-6 ms-4">
                                                            <p class="text-center text-dark">
                                                                <span class="text-dark fw-bold">:</span>&nbsp;{{$data_pembimbing_dua->dosen}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @elseif (!empty($data_pembimbing_dua) && ($data_pembimbing_dua->status == 'Menunggu Persetujuan') && ($data_pembimbing_dua->posisi == 'Pembimbing Dua'))
                                                    <div class="row">
                                                        <div class="col-5"><span class="text-dark fw-bold">Pembimbing Dua</span></div>
                                                        <div class="col-6 ms-2">
                                                            <p class="text-center">
                                                                <span class="text-dark fw-bold">:</span>&nbsp;
                                                                <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @elseif (!empty($data_pembimbing_dua) && ($data_pembimbing_dua->status == 'Tidak Disetujui') && ($data_pembimbing_dua->posisi == 'Pembimbing Dua'))
                                                    <div class="row">
                                                        <div class="col-6"><span class="text-dark fw-bold">Pilih Pembimbing Dua</span></div>
                                                        <div class="col-6">
                                                            <form action="{{ route('mahasiswa.pilihPbb2') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <p class="text-dark d-flex">
                                                                    <span class="text-dark fw-bold">:</span>&nbsp;
                                                                    <select class="form-select form-select form-select-sm @error('dosen') is-invalid @enderror" name="dosen">
                                                                        <option value="">-- Pilih Pembimbing Dua --</option>
                                                                        @foreach ($data_dosen_pbb2 as $pbb2)
                                                                            <option value="{{$pbb2->nama}}">{{$pbb2->nama}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="d-grid">
                                                                    {{-- Pesan Error Untuk Pembimbing Dua --}}
                                                                    @error('dosen')
                                                                        <small class="fw-bold" style="color: #881d1d;">{{ $message }}</small>
                                                                    @enderror
                                                                    </div>
                                                                </p>
                                                                <p class="text-center">
                                                                    <button class="btn btn-sm" type="submit" style="background: #881d1d;color: rgb(255,255,255);font-weight: bold;">
                                                                        <i class="fas fa-mouse-pointer"></i>&nbsp;Pilih
                                                                    </button>
                                                                </p>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @elseif (!empty($pengajuan_topik) && ($pengajuan_topik->status == 'Tidak Disetujui'))
                                                <h4 class="text-center p-5"><b>Anda Belum Memilih Topik!</b></h4>
                                        @elseif (empty($pengajuan_topik))
                                                <h4 class="text-center p-5"><b>Anda Belum Memilih Topik!</b></h4>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-striped table-hover" id="tableData">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Kode Dosen</th>
                                            <th class="text-center">Kuota</th>
                                            <th class="text-center">Bidang</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menampilkanDataDaftarTopik as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->judul }}</td>
                                            <td class="text-center">{{ $data->kode_dosen }}</td>
                                            <td class="text-center">{{ $data->kuota . ' Orang' }}</td>
                                            <td class="text-center">
                                                @php
                                                    $bidangList = $data->bidang;
                                                @endphp
                                                @if ($bidangList)
                                                    @foreach ($bidangList as $bidang)
                                                        <span class="badge bg-dark me-1">{{$bidang}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($data->status == 'Tersedia')
                                                    <span class="badge rounded-pill bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Sudah Penuh</span>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="text-center">
                                                @if (empty($pengajuan_topik->nim) && ($data->status == 'Tersedia'))
                                                    <button class="btn btn-success btn-sm link-light ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#ModalPilihTopik{{ $data->id }}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                @endif
                                                <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalLihatDaftarTopik{{ $data->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                </p>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalPilihTopik{{ $data->id }}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Pilih Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h1 class="display-3"><i class="fas fa-exclamation-triangle"></i></h1>
                                                                <h6>Apakah anda yakin ingin Memilih Topik?</h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">
                                                                    <i class="fa fa-close"></i>&nbsp;Tidak
                                                                </button>
                                                                <a href="{{ route('mahasiswa.pilihTopik', $data->id) }}" class="btn btn-success btn-sm link-light" type="button">
                                                                    <i class="far fa-trash-alt"></i>&nbsp;Ya, Pilih
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="ModalLihatDaftarTopik{{ $data->id }}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-weight: bold;">Lihat Daftar Topik</h5><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Judul</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->judul }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Jurusan</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->program_studi }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Fakultas</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->fakultas }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Bidang</span></div>
                                                                    <div class="col-8">
                                                                        <p>
                                                                            <span class="fw-bold">:&nbsp;</span>
                                                                            @php
                                                                                $bidangList = $data->bidang;
                                                                            @endphp
                                                                            @if ($bidangList)
                                                                                @foreach ($bidangList as $bidang)
                                                                                    <span class="badge bg-dark me-1">{{$bidang}}</span>
                                                                                @endforeach
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kuota</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->kuota . ' Orang' }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Dosen</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->dosen }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kode Dosen</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{ $data->kode_dosen }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Status</span></div>
                                                                    <div class="col-8">
                                                                        <p>
                                                                            <span class="fw-bold">:&nbsp;</span>
                                                                            @if ($data->status == 'Tersedia')
                                                                                <span class="badge rounded-pill bg-success">Tersedia</span>
                                                                            @else
                                                                                <span class="badge rounded-pill bg-danger">Sudah Penuh</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Kelompok</span></div>
                                                                    <div class="col-8">
                                                                        <p>
                                                                            <span class="fw-bold">:&nbsp;</span>
                                                        @php
                                                            $judul_kelompok = $data_kelompok->where('judul', $data->judul);
                                                        @endphp
                                                        @forelse ($judul_kelompok as $kelompok)
                                                            <span class="badge rounded-pill bg-dark me-1 text-truncate w-75">{{$kelompok->nim}} - {{$kelompok->nama_anggota}}</span>
                                                        @empty
                                                            -
                                                        @endforelse
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4"><span style="font-weight: bold;">Deskripsi</span></div>
                                                                    <div class="col-8">
                                                                        <p><span class="fw-bold">:&nbsp;</span>{{$data->deskripsi}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Tutup</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-center"><strong>No</strong></td>
                                            <td class="text-center"><strong>Judul</strong></td>
                                            <td class="text-center"><strong>Kode Dosen</strong></td>
                                            <td class="text-center"><strong>Kuota</strong></td>
                                            <td class="text-center"><strong>Bidang</strong></td>
                                            <td class="text-center"><strong>Status</strong></td>
                                            <td class="text-center"><strong>Aksi</strong></td>
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
    </script>
</body>
</html>