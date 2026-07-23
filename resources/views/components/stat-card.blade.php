@props([
    'title',
    'value',
    'icon',
    'color' => 'blue'
])

<div class="group bg-white dark:bg-slate-900 rounded-3xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6 border border-slate-100 dark:border-slate-800">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-slate-500 dark:text-slate-400 text-sm">
                {{ $title }}
            </p>

            <h2 class="text-4xl font-bold mt-3 text-slate-800 dark:text-white">
                {{ $value }}
            </h2>

        </div>

        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl
            @switch($color)
                @case('blue')
                    bg-blue-100 text-blue-600
                    @break

                @case('green')
                    bg-green-100 text-green-600
                    @break

                @case('yellow')
                    bg-yellow-100 text-yellow-600
                    @break

                @case('purple')
                    bg-purple-100 text-purple-600
                    @break

                @case('red')
                    bg-red-100 text-red-600
                    @break

                @case('cyan')
                    bg-cyan-100 text-cyan-600
                    @break
            @endswitch">

            {{ $icon }}

        </div>

    </div>

    <div class="mt-6 flex items-center text-sm text-green-600">

        ▲ Website aktif

    </div>

</div>