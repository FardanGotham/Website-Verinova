<div {{ $attributes->merge([
    'class' => 'bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200/80 dark:border-slate-800 p-6 transition-colors duration-200'
]) }}>
    {{ $slot }}
</div>
