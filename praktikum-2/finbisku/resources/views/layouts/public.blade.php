@extends('layouts.base')

@section('body')
<div class="min-h-screen flex flex-col bg-brandBg">
    @include('partials.public-header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.public-footer')
</div>
@endsection
