@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Dashboard')

@section('content')
<div class="space-y-6 sm:space-y-8">
    {{-- Header Banner with Date & Live Clock --}}
    @include('admin.dashboard.header')

    {{-- 6 Key Metric Stat Cards --}}
    @include('admin.dashboard.stats')

    {{-- Quick Action Shortcuts --}}
    @include('admin.dashboard.quick-actions')

    {{-- Main Analytics and Recent Data Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 items-stretch">
        <div class="lg:col-span-2">
            @include('admin.dashboard.chart')
        </div>

        <div>
            @include('admin.dashboard.latest-students')
        </div>
    </div>

    {{-- Recent Media Showcase --}}
    @include('admin.dashboard.latest-gallery')
</div>
@endsection
