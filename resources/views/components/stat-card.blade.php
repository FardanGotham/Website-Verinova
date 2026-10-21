@props([
    'title',
    'value',
    'icon' => 'sparkles',
    'color' => 'blue',
    'subtitle' => 'Data terverifikasi'
])

@php
    $themeStyles = match($color) {
        'green', 'emerald' => [
            'iconBg' => 'bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800/40',
            'accent' => 'text-emerald-600 dark:text-emerald-400',
            'badge'  => 'bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-300'
        ],
        'yellow', 'amber' => [
            'iconBg' => 'bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 border border-amber-100 dark:border-amber-800/40',
            'accent' => 'text-amber-600 dark:text-amber-400',
            'badge'  => 'bg-amber-50 dark:bg-amber-950/40 text-amber-700 dark:text-amber-300'
        ],
        'purple', 'violet' => [
            'iconBg' => 'bg-purple-50 dark:bg-purple-950/40 text-purple-600 dark:text-purple-400 border border-purple-100 dark:border-purple-800/40',
            'accent' => 'text-purple-600 dark:text-purple-400',
            'badge'  => 'bg-purple-50 dark:bg-purple-950/40 text-purple-700 dark:text-purple-300'
        ],
        'red', 'rose' => [
            'iconBg' => 'bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-800/40',
            'accent' => 'text-rose-600 dark:text-rose-400',
            'badge'  => 'bg-rose-50 dark:bg-rose-950/40 text-rose-700 dark:text-rose-300'
        ],
        'cyan' => [
            'iconBg' => 'bg-cyan-50 dark:bg-cyan-950/40 text-cyan-600 dark:text-cyan-400 border border-cyan-100 dark:border-cyan-800/40',
            'accent' => 'text-cyan-600 dark:text-cyan-400',
            'badge'  => 'bg-cyan-50 dark:bg-cyan-950/40 text-cyan-700 dark:text-cyan-300'
        ],
        default => [
            'iconBg' => 'bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-800/40',
            'accent' => 'text-blue-600 dark:text-blue-400',
            'badge'  => 'bg-blue-50 dark:bg-blue-950/40 text-blue-700 dark:text-blue-300'
        ]
    };
@endphp

<div class="group relative bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-md transition-all duration-300">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                {{ $title }}
            </p>
            <h3 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                {{ $value }}
            </h3>
        </div>

        <div class="w-12 h-12 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110 duration-300 {{ $themeStyles['iconBg'] }}">
            <x-icon :name="$icon" class="w-6 h-6" />
        </div>
    </div>

    <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs">
        <span class="inline-flex items-center gap-1.5 font-medium {{ $themeStyles['accent'] }}">
            <x-icon name="trending-up" class="w-3.5 h-3.5" />
            <span>{{ $subtitle }}</span>
        </span>
        <span class="text-slate-400 dark:text-slate-500 font-mono">Live</span>
    </div>
</div>
