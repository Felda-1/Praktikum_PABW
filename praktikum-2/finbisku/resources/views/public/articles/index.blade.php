@extends('layouts.public')
@section('title', 'Artikel')
@section('content')
<div class="container mx-auto px-4 py-10">
    <x-page-header title="Artikel keuangan" subtitle="Bacaan singkat untuk mengelola keuangan usaha." />
    <div class="grid gap-5 md:grid-cols-2">
        @forelse ($articles as $article)
            <x-article-card :article="$article" :href="route('articles.show', $article['id'])" />
        @empty
            <p class="text-sm text-neutral-500">Belum ada artikel.</p>
        @endforelse
    </div>
</div>
@endsection
