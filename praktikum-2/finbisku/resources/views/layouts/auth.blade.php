@extends('layouts.base')

@section('body')
<div class="min-h-screen bg-senja-gradient flex items-center justify-center p-4 relative overflow-hidden">
    <div class="hero-glow-1 absolute -top-24 -right-24 h-96 w-96 rounded-full"></div>
    <div class="hero-glow-2 absolute -bottom-24 -left-24 h-96 w-96 rounded-full"></div>
    <div class="relative w-full max-w-md">
        <a href="/" class="flex items-center justify-center gap-3 mb-6">
            <x-logo class="h-10 w-10 text-[#d4a830]" />
            <span class="text-2xl font-extrabold font-display text-white tracking-tight">FINBISKU</span>
        </a>
        <div class="bg-white rounded-card p-8 shadow-xl">
            @yield('content')
        </div>
    </div>
</div>
@endsection
