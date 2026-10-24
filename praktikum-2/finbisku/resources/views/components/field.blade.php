@props(['label', 'name', 'type' => 'text', 'value' => null, 'placeholder' => '', 'options' => [], 'rows' => 5])
@php
    $kelas = 'w-full rounded-input border border-neutral-300 bg-white px-3 py-2.5 text-sm text-neutral-800 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-finbisku-gold-300 focus:border-finbisku-gold-400';
    $isi = $type === 'password' ? null : old($name, $value);
@endphp
<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-neutral-700 mb-1.5">{{ $label }}</label>
    @if ($type === 'select')
        <select id="{{ $name }}" name="{{ $name }}" class="{{ $kelas }}">
            @foreach ($options as $opsi)
                <option @selected($opsi === $isi)>{{ $opsi }}</option>
            @endforeach
        </select>
    @elseif ($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" class="{{ $kelas }}">{{ $isi }}</textarea>
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ $isi }}" class="{{ $kelas }}">
    @endif
</div>
