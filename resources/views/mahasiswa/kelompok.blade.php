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
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa/daftar_topik"><i class="far fa-file-alt"></i><span>Daftar Topik</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/mahasiswa/template_laporan"><i class="fas fa-file-word"></i><span>Template Laporan</span></a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="/mahasiswa/dokumen_cd"><i class="fas fa-file-word"></i><span>Dokumen Capstone Design</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/mahasiswa/kelompok"><i class="fas fa-users"></i><span>Kelompok</span></a></li>
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
                        <h3 class="text-dark mb-0">Kelompok</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <p class="text-dark m-0 fw-bold">Data Kelompok</p>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert"><span><strong>Catatan :</strong></span>
                                <ul>
                                    <li>Anggota Kelompok Minimal 2 Orang Sampai Dengan 5 Orang</li>
                                    <li>Pembimbing 1 Akan Otomatis Dipilih Sesuai Dengan Topik Yang Dimiliki Oleh Dosen Bersangkutan</li>
                                    <li>Pembimbing 2 Bisa Dipilih Setelah Mendapatkan Topik dan Pembimbing 1</li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Anggota Kelompok</h5>
                                    <div class="row mt-4" id="formContainer">
                                        <div class="inputGroup d-flex">
                                        <div class="col-11">
                                            <select class="form-select form-select-sm namaAnggotaSelect" name="nama_anggota[]" id="nama_anggota_1" multiple>
                                                @foreach ($dataMahasiswa as $data)
                                                    <option value="{{$data->nama}}">{{$data->nim}} - {{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-1 ms-1">
                                            <button class="btn btn-danger btn-sm removeInput" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <div class="d-grid gap-2"><button class="btn btn-primary btn-sm" id="addInput" type="button" style="background: rgb(136,29,29);color: rgb(255,255,255);">&nbsp;<i class="fas fa-plus"></i>&nbsp;Anggota Kelompok</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Pembimbing</h5>
                                    <div class="row">
                                        <div class="col"><label class="form-label">Pembimbing 1</label><input class="form-control-sm form-control" type="text"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col"><label class="form-label">Pembimbing 2</label><input class="form-control-sm form-control" type="text"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <div class="d-grid gap-2"><button class="btn btn-sm" type="button" style="background: #881d1d;color: rgb(255,255,255);">&nbsp;<i class="fas fa-save"></i>&nbsp;Pilih Pembimbing 2</button></div>
                                        </div>
                                    </div>
                                </div>
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

$(document).ready(function () {

  // Fungsi untuk menyimpan opsi master pada setiap select
  function initMasterOptions(selector) {
    $(selector).each(function () {
      let options = [];
      $(this).find('option').each(function () {
        options.push({
          value: $(this).val(),
          text: $(this).text()
        });
      });
      $(this).data('options', options);
    });
  }

  // Fungsi untuk inisialisasi Select2 dan pasang event listener perubahan
  function initSelect2(selector) {
    $(selector).select2({
      placeholder: "-- Pilih Nama Anggota --",
      maximumSelectionLength: 1,
      width: '100%',
      language: {
          noResults: function() {
              return "Data Tidak ditemukan";
          },
          maximumSelected: function(args) {
              return "Anda hanya dapat memilih " + args.maximum + " item"; 
          }
      }
    });
    // Setiap ada perubahan pada select, panggil updateOptions
    $(selector).on('change', function () {
      updateOptions();
    });
  }

  // Fungsi untuk meng-update opsi pada setiap select sehingga opsi yang sudah dipilih pada select lain tidak muncul
  function updateOptions() {
    let allSelected = [];
    
    // Kumpulkan seluruh nilai yang terpilih di semua select
    $('.namaAnggotaSelect').each(function () {
      let selected = $(this).val();
      if (selected) {
        if (Array.isArray(selected)) {
          allSelected = allSelected.concat(selected);
        } else {
          allSelected.push(selected);
        }
      }
    });

    // Untuk setiap select, rebuild opsi berdasarkan master data
    $('.namaAnggotaSelect').each(function () {
      let $sel = $(this);
      let currentSelection = $sel.val() || [];
      let masterOptions = $sel.data('options');
      
      let filteredOptions = masterOptions.filter(function (opt) {
        // Tampilkan opsi yang saat ini terpilih, atau opsi yang belum terpilih di select lain
        if (currentSelection.includes(opt.value)) {
          return true;
        }
        return !allSelected.includes(opt.value);
      });

      // Bersihkan opsi yang ada di select
      $sel.empty();

      // Masukkan kembali opsi yang tersisa
      filteredOptions.forEach(function (opt) {
        let selected = currentSelection.includes(opt.value) ? 'selected' : '';
        $sel.append(`<option value="${opt.value}" ${selected}>${opt.text}</option>`);
      });

      // Hancurkan instance Select2 yang lama dan inisialisasi ulang
      $sel.select2('destroy');
      $sel.select2({
        placeholder: "-- Pilih Nama Anggota --",
        maximumSelectionLength: 1,
        width: '100%',
        language: {
          noResults: function() {
              return "Data Tidak Ada";
          },
          maximumSelected: function(args) {
              return "Anda hanya dapat memilih " + args.maximum + " item";
          }
        }
      });
    });
  }

  // Inisialisasi master option dan Select2 untuk input pertama
  initMasterOptions('.namaAnggotaSelect');
  initSelect2('#nama_anggota_1');

  // Event handler tombol "Tambah"
  $('#addInput').on('click', function () {
    let count = $('.inputGroup').length;
    if (count < 5) {
      let index = count + 1;
      let newInput = `
        <div class="inputGroup d-flex mt-3">
          <div class="col-11">
            <select class="form-select form-select-sm namaAnggotaSelect" name="nama_anggota[]" id="nama_anggota_${index}" multiple>
              @foreach ($dataMahasiswa as $data)
                <option value="{{ $data->nama }}">{{ $data->nim }} - {{ $data->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-1 ms-1">
            <button class="btn btn-danger btn-sm removeInput" type="button">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
      `;
      $('#formContainer').append(newInput);
      // Simpan master options untuk select yang baru
      initMasterOptions('#nama_anggota_' + index);
      // Inisialisasi Select2 untuk select yang baru ditambahkan
      initSelect2('#nama_anggota_' + index);
      updateOptions();
    } else {
      return
    }
  });

  // Event delegation untuk tombol "Hapus"
  $(document).on('click', '.removeInput', function () {
    if ($('.inputGroup').length > 1) {
      $(this).closest('.inputGroup').remove();
      updateOptions();
    }
  });
});
        </script>
</body>
</html>