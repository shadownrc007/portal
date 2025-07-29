@php
    $simplePage = false;
    $title = 'Main Dashboard';
    $catName = 'dashboard'; // Asegúrate que esté definido en el sidebar si lo quieres activo
    $scrollspy = false;
    $breadcrumbs = ['Dashboard'];
@endphp

@extends('dashboard::components.layouts.master')

@section('title', 'Panel Principal')

@section('content')
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget widget-one">
            <div class="widget-heading">
                <h6 class="text-primary">Bienvenido al Panel</h6>
            </div>
            <div class="widget-content">
                <p>Este es el panel principal del sistema. Aquí puedes mostrar KPIs, métricas, accesos rápidos o gráficas.</p>
            </div>
        </div>
    </div>
</div>
@endsection
