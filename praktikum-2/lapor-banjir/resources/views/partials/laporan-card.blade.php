<article class="card laporan-card {{ $kelas }}">
    <header class="laporan-card-head">
        <h3>{{ $laporan->nama_pelapor }}</h3>
        <span class="badge {{ $kelas }}">{{ $status }}</span>
    </header>
    <ul class="laporan-meta">
        <li><strong>Lokasi:</strong> {{ $laporan->lokasi }}</li>
        <li><strong>Tinggi genangan:</strong> {{ $laporan->tinggi_genangan }} cm</li>
        <li><strong>Tanggal:</strong> {{ $laporan->tanggal_kejadian->format('d-m-Y') }}</li>
    </ul>
</article>
