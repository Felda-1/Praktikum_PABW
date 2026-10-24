@extends('layouts.public')
@section('title', 'Blog usaha')
@section('content')
<div class="container mx-auto px-4 py-10">
    @include('partials.blog-detail', ['blog' => $blog, 'backUrl' => route('public-blogs.index')])
</div>
@endsection
