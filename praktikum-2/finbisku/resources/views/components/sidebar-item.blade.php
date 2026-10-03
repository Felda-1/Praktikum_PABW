@props(['href', 'icon', 'active' => false, 'badge' => null])
<a href="{{ $href }}" @if($active) aria-current="page" @endif
   class="flex items-center gap-2.5 px-2.5 py-2 rounded-xl font-display font-semibold text-sm transition-all duration-200 {{ $active ? 'bg-[#1a5c38] text-[#d4a830]' : 'text-[#9db8a8] hover:bg-[#1a5c38]/30 hover:text-white' }}">
    <i data-lucide="{{ $icon }}" class="h-5 w-5 flex-shrink-0"></i>
    <span class="flex-grow">{{ $slot }}</span>
    @if ($badge !== null)
        <span class="rounded-full bg-[#d4a830] px-2 py-0.5 text-[10px] font-bold text-[#0f3d2b]">{{ $badge }}</span>
    @endif
</a>
