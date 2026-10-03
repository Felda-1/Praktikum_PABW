@extends('layouts.base')

@section('body')
<div class="min-h-screen bg-brandBg flex font-body">
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-[220px] bg-[#0f3d2b] border-r border-[#1a5c38]/30 transform transition-transform duration-300 ease-in-out -translate-x-full md:relative md:translate-x-0 flex-shrink-0">
        <div class="h-full flex flex-col">
            <div class="p-5 flex items-center justify-between border-b border-[#1a5c38]/30">
                <a href="@yield('homeUrl')" class="flex items-center space-x-3 group">
                    <x-logo class="h-10 w-10 text-[#d4a830] transition-transform duration-200 group-hover:scale-105" />
                    <span class="text-xl font-extrabold font-display text-white tracking-tight group-hover:text-[#d4a830] transition-colors">FINBISKU</span>
                </a>
                <button type="button" class="md:hidden p-1 rounded-btn hover:bg-[#1a5c38]/40 text-[#6b8a78] hover:text-white" data-close-sidebar aria-label="Tutup menu">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>

            <nav class="px-2.5 py-4 space-y-1 flex-grow overflow-y-auto flex flex-col" aria-label="Menu samping">
                @yield('menu')
                <a href="/login" class="w-full flex items-center px-2.5 py-2 rounded-xl text-[#9db8a8] hover:bg-[#1a5c38]/30 hover:text-red-400 transition-all duration-200 mt-auto font-display font-semibold text-sm gap-2.5">
                    <i data-lucide="log-out" class="h-5 w-5 flex-shrink-0"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden min-w-0">
        <header class="h-16 bg-white border-b border-neutral-200 px-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center space-x-4">
                <button type="button" class="md:hidden p-2 rounded-btn hover:bg-neutral-100" data-open-sidebar aria-label="Buka menu">
                    <i data-lucide="menu" class="h-6 w-6 text-neutral-500"></i>
                </button>
                @yield('headerLeft')
            </div>

            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm font-semibold text-neutral-900">@yield('userName')</span>
                    <span class="text-xs text-neutral-500 capitalize">@yield('userRole')</span>
                </div>
                <a href="@yield('profileUrl')" class="w-10 h-10 bg-neutral-100 rounded-full border border-neutral-200 overflow-hidden hover:opacity-85 transition-opacity">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(trim($__env->yieldContent('userName'))) }}&background=random" alt="Avatar">
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto bg-neutral-50 p-6">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-40 md:hidden"></div>
</div>
@endsection
