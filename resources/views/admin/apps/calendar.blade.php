@extends('layouts.app')

@section('styles')
{{-- Style Here --}}
    <link rel="stylesheet" href="{{asset('plugins/src/fullcalendar/fullcalendar.min.css')}}">
    @vite(['resources/scss/light/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/light/assets/components/modal.scss'])

    @vite(['resources/scss/dark/plugins/fullcalendar/custom-fullcalendar.scss'])
    @vite(['resources/scss/dark/assets/components/modal.scss'])
@endsection

@section('content')
<div class="row layout-top-spacing layout-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="calendar-container">
            <div class="calendar"></div>
        </div>
    </div>
</div>

<!-- Modal -->

@endsection

@section('scripts')
    {{-- APEX CHARTS --}}
    <script src="{{ asset('plugins/src/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('plugins/src/apex/custom-apexcharts.js') }}"></script>

    {{-- FULLCALENDAR --}}
    <script src="{{ asset('plugins/src/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/fullcalendar/locales-all.min.js') }}"></script>
    <script src="{{ asset('plugins/src/fullcalendar/custom-fullcalendar.js') }}"></script>

    {{-- TU ARCHIVO PERSONAL COMPILADO --}}
    @vite(['resources/js/widgets/modules-widgets.js'])
@endsection
