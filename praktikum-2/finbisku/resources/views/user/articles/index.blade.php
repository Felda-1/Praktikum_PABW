@extends('layouts.user')
@section('title', 'Pusat Belajar')
@section('content')
<x-page-header title="Pusat Belajar" subtitle="Artikel keuangan dari admin." />
<div class="grid gap-5 md:grid-cols-2">
    @forelse ($articles as $article)
        <x-article-card :article="$article" :href="route('user.articles.show', $article['id'])" />
    @empty
        <p class="text-sm text-neutral-500">Belum ada artikel.</p>
    @endforelse
</div>
@endsection
