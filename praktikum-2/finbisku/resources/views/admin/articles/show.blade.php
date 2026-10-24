@extends('layouts.admin')
@section('title', 'Artikel')
@section('content')
@include('partials.article-detail', ['article' => $article, 'backUrl' => route('admin.articles.index')])
@endsection
