@extends('laporbanjir.layout')

@section('judul', 'Lapor banjir')

@section('konten')
<div class="grid">
    <section>
        <h1>Laporkan banjir di wilayah Anda</h1>
        <p class="lead">Isi data di bawah ini. Laporan membantu petugas menentukan lokasi yang perlu dibantu lebih dulu.</p>

        @if ($errors->any())
            <div class="alert" role="alert">
                Ada isian yang perlu diperbaiki. Periksa kolom yang ditandai merah.
            </div>
        @endif

        <form method="POST" action="{{ route('laporbanjir.kirim') }}" id="form-lapor">
            @csrf

            <div class="field @error('nama_pelapor') has-error @enderror">
                <label for="nama_pelapor">Nama pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor"
                       value="{{ old('nama_pelapor') }}" maxlength="100"
                       autocomplete="name" required>
                @error('nama_pelapor')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field @error('kecamatan') has-error @enderror">
                <label for="kecamatan">Kecamatan</label>
                <select id="kecamatan" name="kecamatan" required>
                    <option value="" disabled @selected(! old('kecamatan'))>Pilih kecamatan</option>
                    @foreach ($daftarKecamatan as $kecamatan)
                        <option value="{{ $kecamatan }}" @selected(old('kecamatan') === $kecamatan)>{{ $kecamatan }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field @error('desa') has-error @enderror">
                <label for="desa">Desa/kelurahan</label>
                <input type="text" id="desa" name="desa"
                       value="{{ old('desa') }}" maxlength="100" required>
                @error('desa')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field @error('tinggi_genangan') has-error @enderror">
                <label for="tinggi_genangan">Tinggi genangan air</label>
                <div class="input-suffix">
                    <input type="number" id="tinggi_genangan" name="tinggi_genangan"
                           value="{{ old('tinggi_genangan') }}" min="1" max="300" step="1"
                           inputmode="numeric" required>
                    <span>cm</span>
                </div>
                <p class="hint">Perkirakan tinggi air dari permukaan tanah. Lihat pengukur di samping sebagai patokan.</p>
                @error('tinggi_genangan')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn" id="tombol-kirim">Kirim laporan</button>
        </form>
    </section>

    @include('laporbanjir._gauge', ['cm' => old('tinggi_genangan', 0)])
</div>
@endsection
