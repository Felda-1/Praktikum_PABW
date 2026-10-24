<article class="card laporan-card {{ $kelas }}">
    <header class="laporan-card-head">
        <h3>{{ $laporan['nama'] }}</h3>
        <span class="badge {{ $kelas }}">{{ $status }}</span>
    </header>
    <ul class="laporan-meta">
        <li><strong>Lokasi:</strong> {{ $laporan['desa'] }}, Kec. {{ $laporan['kecamatan'] }}</li>
        <li><strong>Tinggi genangan:</strong> {{ $laporan['tinggi'] }} cm</li>
        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($laporan['tanggal'])->format('d-m-Y') }}</li>
    </ul>
</article>
