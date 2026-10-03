@extends('layouts.user')
@section('title', 'Tambah transaksi')
@section('content')
<div class="mb-6"><h1 class="text-2xl font-bold font-display text-neutral-800">Tambah transaksi</h1><p class="text-sm text-neutral-500 mt-1">Data disimpan sementara di session, bukan di database.</p></div>

<form method="POST" action="{{ route('transactions.store') }}" class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl space-y-5">
    @csrf

    <div>
        <span class="block text-sm font-semibold text-neutral-700 mb-1.5">Jenis</span>
        <div class="grid grid-cols-2 gap-3">
            @foreach (['pemasukan' => 'Pemasukan', 'pengeluaran' => 'Pengeluaran'] as $val => $label)
                <label class="cursor-pointer">
                    <input type="radio" name="jenis" value="{{ $val }}" class="peer sr-only" @checked(old('jenis', 'pemasukan') === $val)>
                    <span class="block text-center rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm font-semibold text-neutral-600 peer-checked:border-finbisku-gold-400 peer-checked:bg-finbisku-gold-100 peer-checked:text-finbisku-gold-600 peer-focus-visible:ring-2 peer-focus-visible:ring-finbisku-gold-300">{{ $label }}</span>
                </label>
            @endforeach
        </div>
        @error('jenis')<p class="mt-1.5 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="kategori" class="block text-sm font-semibold text-neutral-700 mb-1.5">Kategori</label>
        <select id="kategori" name="kategori" class="w-full rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-finbisku-gold-300 focus:border-finbisku-gold-400" required>
            <option value="" disabled @selected(! old('kategori'))>Pilih kategori</option>
            @foreach ($kategori as $k)
                <option value="{{ $k }}" @selected(old('kategori') === $k)>{{ $k }}</option>
            @endforeach
        </select>
        @error('kategori')<p class="mt-1.5 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="jumlah" class="block text-sm font-semibold text-neutral-700 mb-1.5">Jumlah (Rp)</label>
        <input id="jumlah" name="jumlah" type="number" min="1" step="1" inputmode="numeric" value="{{ old('jumlah') }}" data-rupiah="pratinjau-jumlah" placeholder="Contoh: 150000" class="w-full rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-finbisku-gold-300 focus:border-finbisku-gold-400" required>
        <p id="pratinjau-jumlah" class="mt-1 text-xs font-semibold text-finbisku-green-500" aria-live="polite"></p>
        @error('jumlah')<p class="mt-1.5 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="tanggal" class="block text-sm font-semibold text-neutral-700 mb-1.5">Tanggal</label>
        <input id="tanggal" name="tanggal" type="date" value="{{ old('tanggal', now('Asia/Jakarta')->toDateString()) }}" class="w-full rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-finbisku-gold-300 focus:border-finbisku-gold-400" required>
        @error('tanggal')<p class="mt-1.5 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="keterangan" class="block text-sm font-semibold text-neutral-700 mb-1.5">Keterangan <span class="font-normal text-neutral-500">(opsional)</span></label>
        <input id="keterangan" name="keterangan" type="text" maxlength="150" value="{{ old('keterangan') }}" placeholder="Contoh: Beli beras 25 kg" class="w-full rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-finbisku-gold-300 focus:border-finbisku-gold-400">
        @error('keterangan')<p class="mt-1.5 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit" class="inline-flex items-center justify-center gap-2 bg-finbisku-gold-400 text-white px-4 py-2 rounded-btn text-sm font-bold font-display hover:bg-finbisku-gold-500 hover:shadow-md transition-all">Simpan transaksi</button>
        <a href="{{ route('transactions.index') }}" class="inline-flex items-center justify-center gap-2 border border-neutral-200 bg-white text-neutral-600 px-4 py-2 rounded-btn text-sm font-semibold font-display hover:bg-neutral-100 transition-all">Batal</a>
    </div>
</form>
@endsection
