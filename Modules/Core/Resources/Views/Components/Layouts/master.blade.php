{{-- 
    Layout principal del módulo Core.
    Reutiliza el layout global 'layouts.app' del sistema principal.
    Puedes declarar estas variables desde tus vistas:

    @php
        $title = 'Título de la página';
        $catName = 'core'; // activa ítem en sidebar si lo tienes definido
        $scrollspy = false; // true si quieres scroll interno
        $simplePage = false; // true para login/register sin sidebar
        $breadcrumbs = ['Core', 'Auditoría'];
    @endphp
--}}

@extends('layouts.app')

{{-- Opcional: puedes definir secciones adicionales aquí si el sistema las soporta --}}

{{-- @section('styles') --}}
    {{-- Estilos adicionales del módulo Core si se necesitan --}}
{{-- @endsection --}}

{{-- @section('scripts') --}}
    {{-- Scripts adicionales del módulo Core si se necesitan --}}
{{-- @endsection --}}
