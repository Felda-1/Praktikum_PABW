@props(['items'])
<dl class="bg-white border border-neutral-200 rounded-card p-6 max-w-2xl divide-y divide-neutral-100">
    @foreach ($items as $item)
        <div class="flex flex-col sm:flex-row sm:gap-6 py-3 first:pt-0 last:pb-0">
            <dt class="sm:w-44 text-sm text-neutral-500">{{ $item['label'] }}</dt>
            <dd class="text-sm font-semibold text-neutral-800">
                @if (! empty($item['badge']))
                    <x-badge>{{ $item['value'] }}</x-badge>
                @else
                    {{ $item['value'] }}
                @endif
            </dd>
        </div>
    @endforeach
</dl>
