@extends('layouts.user')
@section('title', 'Bookmarks')
@section('content')
<x-page-header title="Bookmarks" subtitle="Artikel yang Anda simpan (contoh)." />
<div class="grid gap-5 md:grid-cols-2">
    @forelse ($articles as $article)
        <x-article-card :article="$article" :href="route('user.articles.show', $article['id'])" />
    @empty
        <p class="text-sm text-neutral-500">Belum ada artikel yang disimpan.</p>
    @endforelse
</div>
@endsection
