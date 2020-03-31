@extends('adminlte::page')

@section('title', 'Cadastrar Novo Tenant')

@section('content_header')
    <h1>Cadastrar Novo Tenant</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection
