@php
    $simplePage = false;
    $title = 'Calendar';
    $catName = 'apps';
    $scrollspy = false;
    $breadcrumbs = ['Calendar'];
@endphp

@extends('apps::components.layouts.master')

@section('title', $title)

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/src/fullcalendar/fullcalendar.min.css') }}">
    @vite(['resources/scss/light/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/light/assets/components/modal.scss'])
    @vite(['resources/scss/dark/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/dark/assets/components/modal.scss'])
@endsection

@section('content')
<div class="row layout-top-spacing layout-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="calendar-container">
            <div class="calendar"></div> {{-- ✅ Este div es necesario para renderizar el calendario --}}
        </div>
    </div>
</div>

{{-- ✅ Modal separado como partial --}}
@include('apps::partials.calendar-modal')
@endsection

@push('scripts')
    {{-- Scripts necesarios --}}
    <script src="{{ asset('plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/fullcalendar/locales-all.min.js') }}"></script>
    <script src="{{ asset('plugins/src/fullcalendar/custom-fullcalendar.js') }}"></script>
@endpush
