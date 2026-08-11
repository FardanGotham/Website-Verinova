<header class="bg-white border-b border-slate-200 h-20 flex items-center justify-between px-8">

    <div>
        <h2 class="text-2xl font-bold">
            Dashboard Admin
        </h2>

        <p class="text-slate-500 text-sm">
            Selamat datang kembali 
        </p>
    </div>

    <div class="flex items-center gap-4">

        <button
            class="bg-slate-100 hover:bg-slate-200 rounded-full w-11 h-11">
            🌙
        </button>

        <div

class="flex items-center gap-3">

<div

class="text-right">

<p class="font-semibold">

{{ auth()->user()->name }}

</p>

<p class="text-xs text-slate-500">

Administrator

</p>

</div>

<div

class="w-12

h-12

rounded-full

bg-gradient-to-br

from-blue-600

to-cyan-400

flex

items-center

justify-center

text-white

font-bold">

{{ strtoupper(substr(auth()->user()->name,0,1)) }}

</div>

</div>

    </div>
<div class="relative">

<input

type="text"

placeholder="Cari..."

class="w-80

rounded-2xl

bg-slate-100

pl-5

pr-5

py-3

focus:outline-none

focus:ring-2

focus:ring-blue-500">

</div>
</header>