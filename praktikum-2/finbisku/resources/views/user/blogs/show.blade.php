@extends('layouts.user')
@section('title', 'Cerita UMKM')
@section('content')
@include('partials.blog-detail', ['blog' => $blog, 'backUrl' => route('blogs.index')])
@endsection
