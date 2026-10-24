@props(['label', 'value', 'icon', 'tone' => 'green'])
@php
    $tones = [
        'green' => 'bg-finbisku-green-100 text-finbisku-green-600',
        'gold' => 'bg-finbisku-gold-100 text-finbisku-gold-600',
        'red' => 'bg-red-50 text-red-600',
    ];
@endphp
<div class="bg-white border border-neutral-200 rounded-card p-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-neutral-500">{{ $label }}</p>
        <span class="h-9 w-9 rounded-btn flex items-center justify-center {{ $tones[$tone] ?? $tones['green'] }}"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i></span>
    </div>
    <p class="mt-3 text-2xl font-bold font-display text-neutral-800">{{ $value }}</p>
</div>
