@props(['href' => null, 'variant' => 'primary', 'type' => 'button', 'icon' => null, 'full' => false])
@php
    $base = 'inline-flex items-center justify-center gap-2 px-4 py-2 rounded-btn text-sm font-display transition-all';
    $styles = [
        'primary' => 'bg-finbisku-gold-400 text-white font-bold hover:bg-finbisku-gold-500 hover:shadow-md',
        'outline' => 'border border-neutral-200 bg-white text-neutral-600 font-semibold hover:bg-neutral-100',
    ];
    $class = $base.' '.($styles[$variant] ?? $styles['primary']).($full ? ' w-full' : '');
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>@if ($icon)<i data-lucide="{{ $icon }}" class="h-4 w-4"></i>@endif{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>@if ($icon)<i data-lucide="{{ $icon }}" class="h-4 w-4"></i>@endif{{ $slot }}</button>
@endif
