@extends('layouts.panel')

@section('homeUrl', '/dashboard')
@section('profileUrl', '/profile')
@section('userName', 'Rina Pratama')
@section('userRole', 'user')

@section('menu')
<x-sidebar-item href="/dashboard" icon="layout-dashboard" :active="request()->is('dashboard')">Dashboard</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Usaha</div>
<x-sidebar-item href="/business" icon="briefcase" :active="request()->is('business*')" badge="3">Usaha Saya</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Keuangan</div>
<x-sidebar-item href="/transactions" icon="arrow-left-right" :active="request()->is('transactions*')">Keuangan</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Edukasi &amp; Cerita</div>
<x-sidebar-item href="/dashboard/articles" icon="book-open" :active="request()->is('dashboard/articles*')">Pusat Belajar</x-sidebar-item>
<x-sidebar-item href="/blogs" icon="newspaper" :active="request()->is('blogs*')">Cerita UMKM</x-sidebar-item>
<x-sidebar-item href="/bookmarks" icon="bookmark" :active="request()->is('bookmarks')">Bookmarks</x-sidebar-item>
<div class="pt-4 pb-2 px-2.5 text-[10px] font-semibold text-[#6b8a78] uppercase tracking-wider font-display">Pengaturan</div>
<x-sidebar-item href="/profile" icon="user" :active="request()->is('profile*')">Profil Saya</x-sidebar-item>
@endsection

@section('headerLeft')
<div class="relative">
    <button type="button" data-dropdown="menu-usaha" aria-expanded="false" class="flex items-center space-x-2 px-3 py-2 bg-neutral-50 hover:bg-neutral-100 rounded-btn transition-colors border border-neutral-200">
        <span class="w-6 h-6 bg-finbisku-gold-100 text-finbisku-gold-600 flex items-center justify-center rounded-md font-bold text-[10px]">W</span>
        <span class="text-sm font-semibold text-neutral-700 max-w-[150px] truncate">Warung Makan Bu Sari</span>
        <i data-lucide="chevron-down" class="h-4 w-4 text-neutral-500"></i>
    </button>
    <div id="menu-usaha" class="hidden absolute top-full left-0 mt-2 w-64 bg-white border border-neutral-200 rounded-btn shadow-xl z-[70] p-2">
        @foreach (['Warung Makan Bu Sari', 'Kopi Senja', 'Toko Kain Mawar'] as $nama)
            <button type="button" class="w-full flex items-center space-x-3 p-2 rounded-btn transition-colors {{ $loop->first ? 'bg-finbisku-gold-50 text-finbisku-gold-600' : 'hover:bg-neutral-50 text-neutral-600' }}">
                <span class="w-8 h-8 flex items-center justify-center rounded-btn font-bold text-xs {{ $loop->first ? 'bg-finbisku-gold-100 text-finbisku-gold-600' : 'bg-neutral-100 text-neutral-500' }}">{{ $nama[0] }}</span>
                <span class="font-medium text-sm text-left flex-grow truncate">{{ $nama }}</span>
            </button>
        @endforeach
        <div class="border-t border-neutral-100 mt-2 pt-2 px-2">
            <a href="/business" class="block w-full text-center py-2 text-xs font-semibold text-finbisku-gold-600 hover:text-finbisku-gold-500">Kelola Bisnis</a>
        </div>
    </div>
</div>
@endsection
