<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul') - LaporBanjir</title>
    <link rel="stylesheet" href="{{ asset('css/laporbanjir.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a class="brand" href="{{ route('laporbanjir.form') }}">LaporBanjir</a>
            <span class="instansi">BPBD Kabupaten Bandung</span>
        </div>
    </header>

    <main class="wrap">
        @yield('konten')
    </main>

    <footer>Prototipe: data laporan hanya ditampilkan ulang dan tidak disimpan.</footer>

    <script src="{{ asset('js/laporbanjir.js') }}" defer></script>
</body>
</html>
