@props(['type' => 'success', 'title' => null])

<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }} role="alert">
    @if ($title)
        <strong class="alert-title">{{ $title }}</strong>
    @endif
    <div>{{ $slot }}</div>
</div>
