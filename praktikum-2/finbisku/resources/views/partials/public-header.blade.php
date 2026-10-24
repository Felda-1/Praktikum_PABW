@php
    $menu = [
        ['home', 'Home', 'home'],
        ['articles.index', 'Articles', 'articles.*'],
        ['public-blogs.index', 'Blogs', 'public-blogs.*'],
    ];
@endphp
<header class="bg-white border-b border-neutral-200 sticky top-0 z-50">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
            <x-logo class="h-10 w-10 text-[#d4a830] transition-transform duration-200 group-hover:scale-105" />
            <span class="text-xl md:text-2xl font-extrabold font-display text-neutral-800 tracking-tight group-hover:text-[#d4a830] transition-colors">FINBISKU</span>
        </a>

        <nav class="hidden md:flex items-center space-x-2" aria-label="Navigasi utama">
            @foreach ($menu as [$nama, $label, $pola])
                <a href="{{ route($nama) }}" class="text-sm font-semibold font-display px-4 py-2 rounded-btn transition-all {{ request()->routeIs($pola) ? 'bg-finbisku-gold-100 text-finbisku-gold-600' : 'text-neutral-600 hover:bg-neutral-100 hover:text-neutral-900' }}">{{ $label }}</a>
            @endforeach
        </nav>

        <div class="flex items-center space-x-3">
            <a href="{{ route('login') }}" class="text-sm font-bold font-display text-neutral-600 hover:text-neutral-900 px-3 py-2 rounded-btn transition-colors">Login</a>
            <x-button :href="route('register')">Register</x-button>
        </div>
    </div>
</header>
