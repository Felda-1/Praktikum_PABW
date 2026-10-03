@extends('laporbanjir.layout')

@section('judul', 'Laporan diterima')

@section('konten')
<div class="grid">
    <section>
        <h1>Laporan diterima</h1>
        <p class="lead">Terima kasih, {{ $laporan['nama_pelapor'] }}. Berikut data yang Anda kirim.</p>

        <dl class="ringkasan">
            <div>
                <dt>Nama pelapor</dt>
                <dd>{{ $laporan['nama_pelapor'] }}</dd>
            </div>
            <div>
                <dt>Lokasi</dt>
                <dd>{{ $laporan['desa'] }}, Kecamatan {{ $laporan['kecamatan'] }}</dd>
            </div>
            <div>
                <dt>Tinggi genangan</dt>
                <dd>
                    {{ $laporan['tinggi_genangan'] }} cm
                    <span class="badge" data-tingkat="{{ $laporan['tingkat']['kode'] }}">{{ $laporan['tingkat']['label'] }}</span>
                </dd>
            </div>
            <div>
                <dt>Waktu diterima</dt>
                <dd>{{ $laporan['waktu'] }}</dd>
            </div>
        </dl>

        <p class="catatan">Ini prototipe: data tidak disimpan. Menyegarkan halaman ini akan meminta Anda mengirim ulang form.</p>

        <div class="aksi">
            <a class="btn" href="{{ route('laporbanjir.form') }}">Buat laporan baru</a>
        </div>
    </section>

    @include('laporbanjir._gauge', ['cm' => $laporan['tinggi_genangan']])
</div>
@endsection
