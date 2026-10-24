@extends('layouts.public')
@section('title', 'Artikel')
@section('content')
<div class="container mx-auto px-4 py-10">
    @include('partials.article-detail', ['article' => $article, 'backUrl' => route('articles.index')])
</div>
@endsection
