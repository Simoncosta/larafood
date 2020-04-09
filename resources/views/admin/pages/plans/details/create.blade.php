@extends('adminlte::page')

@section('title', "Adicionar Novo Detalhe ao Plano {$plan->name}") 

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.show', $plan->url) }}" class=""> / {{ $plan->name }}</a></li>
        <li><a class="breadcrumb-item" href="{{ route('details.plan.index', $plan->url) }}" class=""> / Detalhes</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('details.plan.create', $plan->url) }}" class="active"> / Novo</a></li>
    </ol>

    <h1>Adicionar Novo Detalhe ao Plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url) }}" method="POST">
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop