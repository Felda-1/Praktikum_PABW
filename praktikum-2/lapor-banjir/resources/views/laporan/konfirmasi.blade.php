@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')
@section('judul', 'Konfirmasi Laporan')

@section('content')

    <x-alert type="success" title="Laporan berhasil dikirim!">
        Terima kasih, {{ $laporan->nama_pelapor }}. Laporan Anda sudah tersimpan dan akan segera ditindaklanjuti oleh BPBD
        Kabupaten Bandung.
    </x-alert>

    <div class="card">
        <h3>Data yang Anda kirim</h3>
        <table class="detail-table">
            <tr>
                <th>Nama Pelapor</th>
                <td>{{ $laporan->nama_pelapor }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $laporan->lokasi }}</td>
            </tr>
            <tr>
                <th>Tinggi Genangan</th>
                <td>{{ $laporan->tinggi_genangan }} cm</td>
            </tr>
            <tr>
                <th>Tanggal Kejadian</th>
                <td>{{ $laporan->tanggal_kejadian->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Waktu Pengiriman</th>
                <td>{{ $laporan->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
            </tr>
        </table>

        <div class="actions">
            <a href="{{ route('laporan.form') }}" class="btn">Buat Laporan Lagi</a>
            <a href="{{ route('laporan.index') }}" class="btn btn-outline">Lihat Daftar Laporan</a>
        </div>
    </div>

@endsection
