<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') | LaporBanjir BPBD Kab. Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <h1 class="brand">LaporBanjir</h1>
            <p class="tagline">Sistem Pelaporan Banjir — BPBD Kabupaten Bandung</p>
        </div>
    </header>

    <nav class="site-nav">
        <div class="container">
            <a href="{{ route('laporan.form') }}"
               class="{{ request()->routeIs('laporan.form', 'laporan.konfirmasi') ? 'active' : '' }}">Buat Laporan</a>
            <a href="{{ route('laporan.index') }}"
               class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">Daftar Laporan</a>
        </div>
    </nav>

    <main class="container">
        <h2 class="page-title">@yield('judul')</h2>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            &copy; {{ date('Y') }} BPBD Kabupaten Bandung — Prototipe LaporBanjir
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
