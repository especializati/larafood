@extends('adminlte::page')

@section('title', "Detalhes do cargo {$role->name}")

@section('content_header')
    <h1>Detalhes do cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $role->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O CARGO: {{ $role->name }}</button>
            </form>
        </div>
    </div>
@endsection
