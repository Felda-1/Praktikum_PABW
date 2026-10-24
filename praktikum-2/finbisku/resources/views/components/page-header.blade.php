@props(['title', 'subtitle' => null])
<div class="flex items-start justify-between flex-wrap gap-3 mb-6">
    <div>
        <h1 class="text-2xl font-bold font-display text-neutral-800">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-sm text-neutral-500 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($slot->isNotEmpty())
        <div>{{ $slot }}</div>
    @endif
</div>
