@props([
    'href' => null,
    'color' => 'primary',
    'type' => 'button'
])

@php
$colors = [
    'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
    'success' => 'bg-green-600 hover:bg-green-700 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-700',
];

$class = $colors[$color] ?? $colors['primary'];
@endphp

@if($href)

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class'=>"inline-flex items-center gap-2 px-5 py-3 rounded-2xl font-medium transition $class"
   ]) }}>

    {{ $slot }}

</a>

@else

<button
type="{{ $type }}"
{{ $attributes->merge([
'class'=>"inline-flex items-center gap-2 px-5 py-3 rounded-2xl font-medium transition $class"
]) }}>

{{ $slot }}

</button>

@endif