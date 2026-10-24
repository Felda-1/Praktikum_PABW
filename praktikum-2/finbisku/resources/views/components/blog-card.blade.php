@props(['blog', 'href'])
<a href="{{ $href }}" class="block bg-white border border-neutral-200 rounded-card p-6 hover:shadow-md transition-all">
    <span class="text-xs font-semibold text-finbisku-green-500">{{ $blog['kategori'] }}</span>
    <h2 class="mt-2 text-lg font-bold font-display text-neutral-800">{{ $blog['judul'] }}</h2>
    <p class="mt-2 text-sm text-neutral-500">Oleh {{ $blog['usaha'] }}</p>
</a>
