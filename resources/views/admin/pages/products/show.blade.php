@extends('adminlte::page')

@section('title', "Detalhes da produto {$product->name}")

@section('content_header')
    <h1>Detalhes da produto <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
            <ul>
                <li>
                    <strong>Título: </strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR o PRODUTO {{ $product->title }}</button>
            </form>
        </div>
    </div>
@endsection
