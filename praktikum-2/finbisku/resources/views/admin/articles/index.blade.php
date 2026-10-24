@extends('layouts.admin')
@section('title', 'Artikel')
@section('content')
<x-page-header title="Kelola artikel" subtitle="Artikel keuangan untuk user.">
    <x-button :href="route('admin.articles.create')" icon="plus">Tambah artikel</x-button>
</x-page-header>
<div class="bg-white border border-neutral-200 rounded-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-neutral-50 text-left text-neutral-500">
            <tr>
                <th class="px-4 py-3 font-semibold">Judul</th>
                <th class="px-4 py-3 font-semibold">Kategori</th>
                <th class="px-4 py-3 font-semibold"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-100">
            @forelse ($articles as $article)
                <tr class="hover:bg-neutral-50">
                    <td class="px-4 py-3"><a href="{{ route('admin.articles.show', $article['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">{{ $article['judul'] }}</a></td>
                    <td class="px-4 py-3">{{ $article['kategori'] }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-3 text-sm">
                            <a href="{{ route('admin.articles.show', $article['id']) }}" class="font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Lihat</a>
                            <a href="{{ route('admin.articles.edit', $article['id']) }}" class="font-semibold text-neutral-500 hover:text-neutral-800">Ubah</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="px-4 py-6 text-center text-neutral-500">Belum ada artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
