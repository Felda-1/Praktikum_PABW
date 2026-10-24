@extends('layouts.public')
@section('title', 'Blog usaha')
@section('content')
<div class="container mx-auto px-4 py-10">
    <x-page-header title="Blog usaha" subtitle="Cerita dari para pelaku UMKM." />
    <div class="grid gap-5 md:grid-cols-3">
        @forelse ($blogs as $blog)
            <x-blog-card :blog="$blog" :href="route('public-blogs.show', $blog['id'])" />
        @empty
            <p class="text-sm text-neutral-500">Belum ada blog usaha.</p>
        @endforelse
    </div>
</div>
@endsection
