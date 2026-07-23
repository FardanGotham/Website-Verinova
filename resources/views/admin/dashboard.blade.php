@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    @include('admin.dashboard.header')

    @include('admin.dashboard.stats')

    @include('admin.dashboard.quick-actions')

    <div class="grid lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">

            @include('admin.dashboard.chart')

        </div>

        @include('admin.dashboard.latest-students')

    </div>

    @include('admin.dashboard.latest-gallery')

</div>

@endsection