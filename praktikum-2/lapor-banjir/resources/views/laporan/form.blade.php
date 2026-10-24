@extends('layouts.app')

@section('title', 'Form Pelaporan')
@section('judul', 'Form Pelaporan Banjir')

@section('content')

    @if ($errors->any())
        <x-alert type="danger" title="Laporan belum dapat dikirim">
            Periksa kembali isian Anda di bawah ini.
        </x-alert>
    @endif

    <form action="{{ route('laporan.konfirmasi') }}" method="POST" class="card form-card" id="form-laporan" novalidate>
        @csrf

        <div class="form-group">
            <label for="nama">Nama Pelapor</label>
            <input type="text" id="nama" name="nama_pelapor" value="{{ old('nama_pelapor') }}" placeholder="Contoh: Asep Sunandar">
            @error('nama_pelapor') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select id="kecamatan" name="kecamatan">
                <option value="">-- Pilih kecamatan --</option>
                @foreach ($daftarKecamatan as $kec)
                    <option value="{{ $kec }}" @selected(old('kecamatan') === $kec)>{{ $kec }}</option>
                @endforeach
            </select>
            @error('kecamatan') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="desa">Desa / Kelurahan</label>
            <input type="text" id="desa" name="desa" value="{{ old('desa') }}" placeholder="Contoh: Citeureup">
            @error('desa') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tinggi">Tinggi Genangan Air (cm)</label>
            <input type="number" id="tinggi" name="tinggi_genangan" value="{{ old('tinggi_genangan') }}" min="0" step="1"
                placeholder="Contoh: 50">
            @error('tinggi_genangan') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Kejadian</label>
            <input type="date" id="tanggal" name="tanggal_kejadian" value="{{ old('tanggal_kejadian', $hariIni) }}"
                max="{{ $hariIni }}">
            @error('tanggal_kejadian') <small class="error">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn">Kirim Laporan</button>
    </form>

@endsection
