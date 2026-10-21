@props([
    'href' => null,
    'variant' => 'primary', // primary, secondary, danger, success, outline, ghost
    'size' => 'md', // sm, md, lg
    'icon' => null,
    'iconRight' => null,
    'type' => 'button'
])

@php
    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1.5 text-xs rounded-xl gap-1.5',
        'lg' => 'px-6 py-3.5 text-base rounded-2xl gap-2.5',
        default => 'px-4 py-2.5 text-sm rounded-xl gap-2'
    };

    $variantClasses = match($variant) {
        'secondary' => 'bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700',
        'danger' => 'bg-rose-600 hover:bg-rose-700 text-white shadow-sm hover:shadow shadow-rose-600/20 focus:ring-rose-500',
        'success' => 'bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm hover:shadow shadow-emerald-600/20 focus:ring-emerald-500',
        'outline' => 'bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-300 dark:border-slate-700',
        'ghost' => 'bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300',
        default => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm hover:shadow shadow-blue-600/20 focus:ring-blue-500'
    };

    $baseClasses = "inline-flex items-center justify-center font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-slate-900 disabled:opacity-50 disabled:cursor-not-allowed select-none {$sizeClasses} {$variantClasses}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4 shrink-0" />
        @endif
        {{ $slot }}
        @if($iconRight)
            <x-icon :name="$iconRight" class="w-4 h-4 shrink-0" />
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        @if($icon)
            <x-icon :name="$icon" class="w-4 h-4 shrink-0" />
        @endif
        {{ $slot }}
        @if($iconRight)
            <x-icon :name="$iconRight" class="w-4 h-4 shrink-0" />
        @endif
    </button>
@endif
