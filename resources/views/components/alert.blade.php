@props([
    'type' => 'info',
    'title' => null
])

@php
    $config = match($type) {
        'success' => [
            'wrap' => 'bg-emerald-50 dark:bg-emerald-950/30 border-emerald-200 dark:border-emerald-800/50 text-emerald-900 dark:text-emerald-100',
            'icon' => 'check',
            'iconColor' => 'text-emerald-600 dark:text-emerald-400'
        ],
        'error', 'danger' => [
            'wrap' => 'bg-rose-50 dark:bg-rose-950/30 border-rose-200 dark:border-rose-800/50 text-rose-900 dark:text-rose-100',
            'icon' => 'alert-triangle',
            'iconColor' => 'text-rose-600 dark:text-rose-400'
        ],
        'warning' => [
            'wrap' => 'bg-amber-50 dark:bg-amber-950/30 border-amber-200 dark:border-amber-800/50 text-amber-900 dark:text-amber-100',
            'icon' => 'alert-triangle',
            'iconColor' => 'text-amber-600 dark:text-amber-400'
        ],
        default => [
            'wrap' => 'bg-blue-50 dark:bg-blue-950/30 border-blue-200 dark:border-blue-800/50 text-blue-900 dark:text-blue-100',
            'icon' => 'info',
            'iconColor' => 'text-blue-600 dark:text-blue-400'
        ]
    };
@endphp

<div {{ $attributes->merge(['class' => "border rounded-2xl p-4 flex items-start gap-3 {$config['wrap']}"]) }}>
    <div class="shrink-0 mt-0.5 {{ $config['iconColor'] }}">
        <x-icon :name="$config['icon']" class="w-5 h-5" />
    </div>
    <div class="flex-1 text-sm leading-relaxed">
        @if($title)
            <h5 class="font-semibold mb-1">{{ $title }}</h5>
        @endif
        {{ $slot }}
    </div>
</div>
