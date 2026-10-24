{{-- Variabel: $blog, $backUrl --}}
<div class="max-w-3xl">
    <x-button :href="$backUrl" variant="outline">&larr; Kembali</x-button>
    <article class="mt-5 bg-white border border-neutral-200 rounded-card p-6">
        <h1 class="text-3xl font-extrabold font-display text-neutral-800">{{ $blog['judul'] }}</h1>
        <p class="mt-1 text-sm text-neutral-500">{{ $blog['usaha'] }} &middot; {{ $blog['kategori'] }} &middot; Blog #{{ $blog['id'] }}</p>
        <div class="mt-5 space-y-4 text-neutral-600 leading-relaxed">
            @foreach ($blog['isi'] as $paragraf)
                <p>{{ $paragraf }}</p>
            @endforeach
        </div>
    </article>
</div>
