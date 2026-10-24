@extends('layouts.app')

@section('title', 'Daftar Laporan')
@section('judul', 'Daftar Laporan Banjir')

@section('content')

    <p class="legend">
        Keterangan status:
        <span class="badge waspada">Waspada &lt; 30 cm</span>
        <span class="badge siaga">Siaga 30–70 cm</span>
        <span class="badge awas">Awas &gt; 70 cm</span>
    </p>

    <div class="card-grid">
        @forelse ($daftarLaporan as $laporan)

            @if ($laporan->tinggi_genangan < 30)
                @include('partials.laporan-card', ['laporan' => $laporan, 'status' => 'Waspada', 'kelas' => 'waspada'])
            @elseif ($laporan->tinggi_genangan <= 70)
                @include('partials.laporan-card', ['laporan' => $laporan, 'status' => 'Siaga', 'kelas' => 'siaga'])
            @else
                @include('partials.laporan-card', ['laporan' => $laporan, 'status' => 'Awas', 'kelas' => 'awas'])
            @endif

        @empty
            <p>Belum ada laporan banjir.</p>
        @endforelse
    </div>

@endsection
