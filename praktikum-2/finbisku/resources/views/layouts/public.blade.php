@extends('layouts.base')

@section('body')
<div class="min-h-screen flex flex-col bg-brandBg">
    <header class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center space-x-3 group">
                <x-logo class="h-10 w-10 text-[#d4a830] transition-transform duration-200 group-hover:scale-105" />
                <span class="text-xl md:text-2xl font-extrabold font-display text-neutral-800 tracking-tight group-hover:text-[#d4a830] transition-colors">FINBISKU</span>
            </a>

            <nav class="hidden md:flex items-center space-x-2" aria-label="Navigasi utama">
                @foreach ([['/', 'Home', '/'], ['/articles', 'Articles', 'articles*'], ['/public-blogs', 'Blogs', 'public-blogs*']] as [$href, $label, $pattern])
                    <a href="{{ $href }}" class="text-sm font-semibold font-display px-4 py-2 rounded-btn transition-all {{ request()->is($pattern) ? 'bg-finbisku-gold-100 text-finbisku-gold-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <div class="flex items-center space-x-3">
                <a href="/login" class="text-sm font-bold font-display text-neutral-600 hover:text-neutral-900 px-3 py-2 rounded-btn transition-colors">Login</a>
                <a href="/register" class="bg-finbisku-gold-400 text-white px-4 py-2 rounded-btn text-sm font-bold font-display hover:bg-finbisku-gold-500 hover:shadow-md transition-all">Register</a>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-neutral-200 py-12 font-body">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <a href="/" class="flex items-center space-x-3 mb-4 group">
                        <x-logo class="h-10 w-10 text-[#d4a830]" />
                        <span class="text-xl md:text-2xl font-extrabold font-display text-neutral-800 tracking-tight">FINBISKU</span>
                    </a>
                    <p class="text-neutral-500 text-sm max-w-xs leading-relaxed">Sistem informasi keuangan dan manajemen bisnis untuk kemajuan UMKM Indonesia.</p>
                </div>
                <div>
                    <h4 class="font-semibold font-display text-neutral-800 mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm text-neutral-500">
                        <li><a href="/" class="hover:text-finbisku-gold-500 transition-colors">Home</a></li>
                        <li><a href="/articles" class="hover:text-finbisku-gold-500 transition-colors">Articles</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold font-display text-neutral-800 mb-4">Bantuan</h4>
                    <ul class="space-y-2 text-sm text-neutral-500">
                        <li><a href="/login" class="hover:text-finbisku-gold-500 transition-colors">Login</a></li>
                        <li><a href="/register" class="hover:text-finbisku-gold-500 transition-colors">Register</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-neutral-100 text-center text-sm text-neutral-500">
                &copy; {{ date('Y') }} FINBISKU. All rights reserved.
            </div>
        </div>
    </footer>
</div>
@endsection
