@extends('adminlte::page')

@section('title', "Editar o Detalhe {$detail->name}") 

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.show', $plan->url) }}" class=""> / {{ $plan->name }}</a></li>
        <li><a class="breadcrumb-item" href="{{ route('details.plan.index', $plan->url) }}" class=""> / Detalhes</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="active"> / Editar</a></li>
    </ol>

    <h1>Editar o Detalhe {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop