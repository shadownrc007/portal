@php
    $simplePage = false;
    $title = 'Calendar';
    $catName = 'apps';
    $scrollspy = false;
   $breadcrumbs = ['Apps', 'Calendar'];
@endphp

@extends('apps::components.layouts.master')

@section('title', $title)


@section('styles')
    {{-- FullCalendar CSS puro --}}
    <link rel="stylesheet" href="{{ asset('plugins/src/fullcalendar/fullcalendar.min.css') }}">


    {{-- SCSS de tu módulo Apps (si quieres personalizar) --}}
    @vite('Modules/Apps/Resources/Assets/sass/app.scss')
    @vite(['resources/scss/dark/assets/components/modal.scss'])
  
    @vite(['resources/scss/light/assets/components/modal.scss'])


    <style>
        .calendar { min-height: 650px; }
    </style>
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

{{-- ─────────────────── SCRIPTS ─────────────────── --}}
@push('scripts')
  <script src="{{ asset('plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('plugins/src/fullcalendar/locales-all.min.js') }}"></script>
  @vite('resources/js/apps/custom-fullcalendar.js')
@endpush

