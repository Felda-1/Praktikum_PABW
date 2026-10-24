@extends('layouts.user')
@section('title', 'Artikel')
@section('content')
@include('partials.article-detail', ['article' => $article, 'backUrl' => route('user.articles.index'), 'bookmark' => true])
@endsection
