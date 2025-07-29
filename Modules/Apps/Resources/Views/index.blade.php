@php
    $simplePage = false;
    $title = 'Aplicaciones';
    $catName = 'apps';
    $scrollspy = false;
    $breadcrumbs = ['Apps'];
@endphp

@extends('apps::components.layouts.master')

@section('title', $title)

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="alert alert-info">Módulo <strong>Apps</strong> creado correctamente.</div>
        </div>
    </div>
@endsection
