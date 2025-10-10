{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <!-- Angka 404 -->
        <h1 class="display-1 fw-bold text-danger mb-3" style="font-size: 8rem;">
            404
        </h1>

        <!-- Pesan -->
        <p class="fs-3 fw-semibold text-secondary">
            Oops! Anda Tidak Memiliki Akses Ke Halaman Ini.
        </p>

        <!-- Tombol -->
        <a href="{{ url('/') }}" 
           class="btn btn-primary btn-lg shadow mt-3">
            Kembali ke Beranda
        </a>
    </div>

    <style>
        /* Tambahan efek animasi sederhana */
        h1 {
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</body>
</html>
