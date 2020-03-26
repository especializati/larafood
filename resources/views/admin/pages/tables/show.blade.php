@extends('adminlte::page')

@section('title', "Detalhes da mesa {$table->identify}")

@section('content_header')
    <h1>Detalhes da mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificador da mesa: </strong> {{ $table->identify }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $table->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A MESA {{ $table->identify }}</button>
            </form>
        </div>
    </div>
@endsection
