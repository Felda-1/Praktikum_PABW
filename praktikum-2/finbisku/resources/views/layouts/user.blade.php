@extends('layouts.panel')

@section('homeUrl', route('dashboard'))
@section('profileUrl', route('profile'))
@section('userName', 'Rina Pratama')
@section('userRole', 'user')

@section('menu')
<x-sidebar-item :href="route('dashboard')" icon="layout-dashboard" :active="request()->routeIs('dashboard')">Dashboard</x-sidebar-item>
<x-sidebar-heading>Usaha</x-sidebar-heading>
<x-sidebar-item :href="route('business.index')" icon="briefcase" :active="request()->routeIs('business.*')" :badge="count($usahaList)">Usaha Saya</x-sidebar-item>
<x-sidebar-heading>Keuangan</x-sidebar-heading>
<x-sidebar-item :href="route('transactions.index')" icon="arrow-left-right" :active="request()->routeIs('transactions.*')">Keuangan</x-sidebar-item>
<x-sidebar-heading>Edukasi &amp; Cerita</x-sidebar-heading>
<x-sidebar-item :href="route('user.articles.index')" icon="book-open" :active="request()->routeIs('user.articles.*')">Pusat Belajar</x-sidebar-item>
<x-sidebar-item :href="route('blogs.index')" icon="newspaper" :active="request()->routeIs('blogs.*')">Cerita UMKM</x-sidebar-item>
<x-sidebar-item :href="route('bookmarks')" icon="bookmark" :active="request()->routeIs('bookmarks')">Bookmarks</x-sidebar-item>
<x-sidebar-heading>Pengaturan</x-sidebar-heading>
<x-sidebar-item :href="route('profile')" icon="user" :active="request()->routeIs('profile', 'profile.password')">Profil Saya</x-sidebar-item>
@endsection

@section('headerLeft')
@php($usahaAktif = $usahaList->first())
<div class="relative">
    <button type="button" data-dropdown="menu-usaha" aria-expanded="false" class="flex items-center space-x-2 px-3 py-2 bg-neutral-50 hover:bg-neutral-100 rounded-btn transition-colors border border-neutral-200">
        <span class="w-6 h-6 bg-finbisku-gold-100 text-finbisku-gold-600 flex items-center justify-center rounded-md font-bold text-[10px]">{{ $usahaAktif ? mb_substr($usahaAktif->nama, 0, 1) : '?' }}</span>
        <span class="text-sm font-semibold text-neutral-700 max-w-[150px] truncate">{{ $usahaAktif?->nama ?? 'Belum ada usaha' }}</span>
        <i data-lucide="chevron-down" class="h-4 w-4 text-neutral-500"></i>
    </button>
    <div id="menu-usaha" class="hidden absolute top-full left-0 mt-2 w-64 bg-white border border-neutral-200 rounded-btn shadow-xl z-[70] p-2">
        @foreach ($usahaList as $usaha)
            <button type="button" class="w-full flex items-center space-x-3 p-2 rounded-btn transition-colors {{ $loop->first ? 'bg-finbisku-gold-50 text-finbisku-gold-600' : 'hover:bg-neutral-50 text-neutral-600' }}">
                <span class="w-8 h-8 flex items-center justify-center rounded-btn font-bold text-xs {{ $loop->first ? 'bg-finbisku-gold-100 text-finbisku-gold-600' : 'bg-neutral-100 text-neutral-500' }}">{{ mb_substr($usaha->nama, 0, 1) }}</span>
                <span class="font-medium text-sm text-left flex-grow truncate">{{ $usaha->nama }}</span>
            </button>
        @endforeach
        <div class="border-t border-neutral-100 mt-2 pt-2 px-2">
            <a href="{{ route('business.index') }}" class="block w-full text-center py-2 text-xs font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Kelola Bisnis</a>
        </div>
    </div>
</div>
@endsection