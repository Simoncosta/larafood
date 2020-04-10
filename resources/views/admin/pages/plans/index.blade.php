@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
    </ol>

    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" class="POST" class="form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <br>
                <button type="submit" class="btn btn-dark mb-2">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width='290'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                        <td width='10px;'>
                            <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                            <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                            <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $plans->appends($filters)->links() !!}
            @else
            {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop