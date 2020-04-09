@extends('adminlte::page')

@section('title', "Detalhes do Detalhe {$detail->name}") 

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.show', $plan->url) }}" class=""> / {{ $plan->name }}</a></li>
        <li><a class="breadcrumb-item" href="{{ route('details.plan.index', $plan->url) }}" class=""> / Detalhes</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="active"> / Detalhes</a></li>
    </ol>

    <h1>Detalhes do Detalhe {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$detail->name}}</li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="post">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o Detalhe {{ $detail->name }}, do plano {{ $plan->name }}</button>
            </form>
        </div>
    </div>
@stop