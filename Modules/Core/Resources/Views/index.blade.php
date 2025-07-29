@php
    $simplePage = false;
    $title = 'Auditoría del Sistema';
    $catName = 'core';
    $scrollspy = false;
    $breadcrumbs = ['Core'];
@endphp

@extends('core::components.layouts.master')

@section('title', $title)

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
@endsection

@section('content')
<div class="row layout-top-spacing">
    <div class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Registros de Auditoría</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area br-8">
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover dataTable nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Evento</th>
                                <th>IP</th>
                                <th>Agente</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>{{ $audit->user->name ?? 'Desconocido' }}</td>
                                    <td>{{ $audit->event }}</td>
                                    <td>{{ $audit->ip_address }}</td>
                                    <td>{{ Str::limit($audit->user_agent, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($audit->created_at)->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#zero-config').DataTable({
            language: {
    paginate: {
        previous: '',
        next: ''
    },
    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    lengthMenu: "Mostrar _MENU_ registros",
    search: "Buscar:",
    zeroRecords: "No se encontraron resultados",
    emptyTable: "No hay datos disponibles en la tabla"
},

            dom:
                "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l>" +
                "<'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
            pageLength: 10,
            lengthMenu: [7, 10, 20, 50],
            responsive: true,
            stripeClasses: []
        });
    });
</script>
@endpush
