@php
    $simplePage = false;
    $title = 'Listado de Usuarios';
    $catName = 'users';
    $scrollspy = false;
    $breadcrumbs = ['Users'];
@endphp

@extends('users::components.layouts.master')

@section('title', $title)

@section('styles')
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
                    <div class="col-12">
                        <h4>Usuarios del Sistema</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area br-8">
                <div class="table-responsive">
                    <table id="users-table" class="table dt-table-hover dataTable nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Departamento</th>
                                <th>Registrado</th>
                                <th>Status</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name ?? ($user->first_name . ' ' . $user->last_name) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                    <td>{{ $user->department ?? 'No asignado' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i') }}</td>
                                  <td>
                                        @if ($user->status === 'enabled')
                                            <span class="badge badge-success mb-2 me-4">Activo</span>
                                        @else
                                            <span class="badge badge-warning mb-2 me-4">Desactivado</span>
                                        @endif
                                  </td>
                                  <td>
                                    <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('PATCH')
                                        @if ($user->status === 'enabled')
                                        <button type="submit" class="badge badge-light-danger mb-2 me-4">Desactivar</button>
                                        @else
                                        <button type="submit" class="badge badge-light-success mb-2 me-4">Activar</button>
                                        @endif
                                    </form>
                                 </td>
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
        $('#users-table').DataTable({
            language: {
                paginate: { previous: '', next: '' },
                info: "Mostrando _START_ a _END_ de _TOTAL_ usuarios",
                lengthMenu: "Mostrar _MENU_ registros",
                search: "Buscar:",
                zeroRecords: "No se encontraron resultados",
                emptyTable: "No hay usuarios registrados"
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
