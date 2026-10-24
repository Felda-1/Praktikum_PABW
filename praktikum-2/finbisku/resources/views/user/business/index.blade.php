@extends('layouts.user')
@section('title', 'Usaha Saya')
@section('content')
<x-page-header title="Usaha saya" subtitle="Semua usaha yang Anda kelola.">
    <x-button :href="route('business.create')" icon="plus">Tambah usaha</x-button>
</x-page-header>
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Nama usaha</th>
                <th class="px-4 py-3 font-semibold">Jenis</th>
                <th class="px-4 py-3 font-semibold">Kota</th>
                <th class="px-4 py-3 font-semibold"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($businesses as $business)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3"><a href="{{ route('business.show', $business['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">{{ $business['nama'] }}</a></td>
                    <td class="px-4 py-3"><x-badge>{{ $business['jenis'] }}</x-badge></td>
                    <td class="px-4 py-3">{{ $business['kota'] }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-3 text-sm">
                            <a href="{{ route('business.show', $business['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Lihat</a>
                            <a href="{{ route('business.edit', $business['id']) }}" class="font-semibold text-neutral-500 hover:text-neutral-800">Ubah</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-neutral-500">Belum ada usaha.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
