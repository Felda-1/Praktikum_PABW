@props(['article', 'href'])
<a href="{{ $href }}" class="block bg-white border border-neutral-200 rounded-card p-6 hover:shadow-md hover:border-finbisku-gold-200 transition-all">
    <span class="text-xs font-semibold uppercase tracking-wider text-finbisku-gold-600">{{ $article['kategori'] }}</span>
    <h2 class="mt-2 text-lg font-bold font-display text-neutral-800">{{ $article['judul'] }}</h2>
    <p class="mt-2 text-sm text-neutral-500">{{ $article['ringkasan'] }}</p>
</a>
