<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>infoTA</title>
    <link rel="stylesheet" href="{{ asset('/storage/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('/storage/assets/css/style.css') }}">
</head>

<body style="background: #881d1d;">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center" style="width: 100%;height: 100vh;">
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-body p-5">
                        <p class="text-center">
                            <img class="img-fluid" src="{{ asset('/storage/assets/img/Logo/Logo%20(250%20x%20250%20piksel).png') }}" style="width: 210px;">
                        </p>
                        <h2 class="text-dark card-title mb-2 mt-5" style="font-family: Poppins, sans-serif;font-weight: bold;">Buat Kata Sandi Baru</h2>
                        <form action="{{ route('buat_kata_sandi') }}" class="pt-4" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="form-label fs-5 text-dark" style="font-family: Poppins, sans-serif;">Kata Sandi Baru</label>
                            <input class="bg-light-subtle bg-gradient border rounded-pill border-dark-subtle shadow form-control form-control-lg @error('kata_sandi_baru') is-invalid @enderror" type="password" placeholder="Kata Sandi Baru" name="kata_sandi_baru" style="font-size: 18px;" data-bs-theme="light">
                            {{-- Pesan Error Untuk Kata Sandi Baru --}}
                            @error('kata_sandi_baru')
                                <small class="fw-bold" style="color: #881d1d;">{{ $message }}</small>
                                <br>
                            @enderror

                            <label class="form-label fs-5 text-dark pt-4" style="font-family: Poppins, sans-serif;">Konfirmasi Kata Sandi</label>
                            <input class="bg-light-subtle bg-gradient border rounded-pill border-dark-subtle shadow form-control form-control-lg @error('konfirmasi_kata_sandi') is-invalid @enderror" type="password" placeholder="Konfirmasi Kata Sandi" name="konfirmasi_kata_sandi" style="font-size: 18px;" data-bs-theme="light">
                            {{-- Pesan Error Untuk Konfirmasi Kata Sandi --}}
                            @error('konfirmasi_kata_sandi')
                                <small class="fw-bold" style="color: #881d1d;">{{ $message }}</small>
                            @enderror

                            <p class="text-center d-grid gap-2 pt-4">
                                <button class="btn btn-primary btn-lg border rounded-pill" type="submit" style="background: rgb(136,29,29);">Simpan</button>
                            </p>
                            <p class="text-center">
                                <a class="text-center pt-3" href="/logout" style="color: rgb(136,29,29);font-family: Roboto, sans-serif; text-decoration:none;">Kembali ke Halaman Masuk</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/storage/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/theme.js') }}"></script>
</body>

</html>