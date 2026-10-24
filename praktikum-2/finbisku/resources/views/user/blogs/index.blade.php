@extends('layouts.user')
@section('title', 'Cerita UMKM')
@section('content')
<x-page-header title="Cerita UMKM" subtitle="Blog usaha milik Anda.">
    <x-button :href="route('blogs.create')" icon="plus">Tulis cerita</x-button>
</x-page-header>
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Judul</th>
                <th class="px-4 py-3 font-semibold">Usaha</th>
                <th class="px-4 py-3 font-semibold"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($blogs as $blog)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3"><a href="{{ route('blogs.show', $blog['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">{{ $blog['judul'] }}</a></td>
                    <td class="px-4 py-3">{{ $blog['usaha'] }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-3 text-sm">
                            <a href="{{ route('blogs.show', $blog['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Lihat</a>
                            <a href="{{ route('blogs.edit', $blog['id']) }}" class="font-semibold text-neutral-500 hover:text-neutral-800">Ubah</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="px-4 py-6 text-center text-neutral-500">Belum ada cerita.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
