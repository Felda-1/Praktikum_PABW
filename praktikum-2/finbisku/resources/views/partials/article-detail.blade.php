{{-- Variabel: $article, $backUrl, $bookmark (opsional, default false) --}}
<div class="max-w-3xl">
    <x-button :href="$backUrl" variant="outline">&larr; Kembali</x-button>
    <article class="mt-5 bg-white border border-neutral-200 rounded-card p-6">
        <span class="text-xs font-semibold uppercase tracking-wider text-finbisku-gold-600">{{ $article['kategori'] }}</span>
        <h1 class="mt-2 text-3xl font-extrabold font-display text-neutral-800">{{ $article['judul'] }}</h1>
        <p class="mt-1 text-sm text-neutral-500">Ditulis oleh {{ $article['penulis'] }} &middot; Artikel #{{ $article['id'] }}</p>
        @if ($bookmark ?? false)
            <div class="mt-4">
                <x-button variant="outline" icon="bookmark" data-bookmark aria-pressed="false"><span>Simpan ke bookmark</span></x-button>
            </div>
        @endif
        <div class="mt-5 space-y-4 text-neutral-600 leading-relaxed">
            @foreach ($article['isi'] as $paragraf)
                <p>{{ $paragraf }}</p>
            @endforeach
        </div>
    </article>
</div>
