@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}" class="active">Pedidos</a></li>
    </ol>

    <h1>Pedidos</h1>
@stop

@section('content')
    <div id="app" class="card">
        <orders-tenant></orders-tenant>
    </div>
@stop

@section('adminlte_js')
<script src="{{ asset('js/app.js') }}"></script>
@stop

@push('scripts-header')
<script>
    window.Laravel = {!! json_encode([
        'tenantId' => auth()->check() ? auth()->user()->tenant_id : ''
    ]) !!}
</script>
@endpush
