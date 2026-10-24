<footer class="bg-white border-t border-neutral-200 py-12 font-body">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 mb-4 group">
                    <x-logo class="h-10 w-10 text-[#d4a830]" />
                    <span class="text-xl md:text-2xl font-extrabold font-display text-neutral-800 tracking-tight">FINBISKU</span>
                </a>
                <p class="text-neutral-500 text-sm max-w-xs leading-relaxed">Sistem informasi keuangan dan manajemen bisnis untuk kemajuan UMKM Indonesia.</p>
            </div>
            <div>
                <h4 class="font-semibold font-display text-neutral-800 mb-4">Navigasi</h4>
                <ul class="space-y-2 text-sm text-neutral-500">
                    <li><a href="{{ route('home') }}" class="hover:text-finbisku-gold-500 transition-colors">Home</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-finbisku-gold-500 transition-colors">Articles</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold font-display text-neutral-800 mb-4">Bantuan</h4>
                <ul class="space-y-2 text-sm text-neutral-500">
                    <li><a href="{{ route('login') }}" class="hover:text-finbisku-gold-500 transition-colors">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-finbisku-gold-500 transition-colors">Register</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-neutral-100 text-center text-sm text-neutral-500">
            &copy; {{ date('Y') }} FINBISKU. All rights reserved.
        </div>
    </div>
</footer>
