@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')
@section('judul', 'Konfirmasi Laporan')

@section('content')

    <x-alert type="success" title="Laporan berhasil dikirim!">
        Terima kasih, {{ $laporan['nama'] }}. Laporan Anda sudah kami terima dan akan segera ditindaklanjuti oleh BPBD
        Kabupaten Bandung.
    </x-alert>

    <div class="card">
        <h3>Data yang Anda kirim</h3>
        <table class="detail-table">
            <tr>
                <th>Nama Pelapor</th>
                <td>{{ $laporan['nama'] }}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{ $laporan['kecamatan'] }}</td>
            </tr>
            <tr>
                <th>Desa / Kelurahan</th>
                <td>{{ $laporan['desa'] }}</td>
            </tr>
            <tr>
                <th>Tinggi Genangan</th>
                <td>{{ $laporan['tinggi'] }} cm</td>
            </tr>
            <tr>
                <th>Waktu Pengiriman</th>
                <td>{{ $laporan['waktu'] }}</td>
            </tr>
        </table>

        <div class="actions">
            <a href="{{ route('laporan.form') }}" class="btn">Buat Laporan Lagi</a>
            <a href="{{ route('laporan.index') }}" class="btn btn-outline">Lihat Daftar Laporan</a>
        </div>
    </div>

@endsection