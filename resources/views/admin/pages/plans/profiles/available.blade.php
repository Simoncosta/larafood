@extends('adminlte::page')

@section('title', "Perfis Disponíveis Plano {$plan->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.profiles', $plan->id) }}"> / Perfis</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('plans.profiles.available', $plan->id) }}" class="active"> / Disponíveis</a></li>
    </ol>

    <h1>Perfis Disponíveis Plano <strong>{{$plan->name}}</strong></h1>

    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.profiles.available', $plan->id) }}" class="POST" class="form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <br>
                <button type="submit" class="btn btn-dark mb-2">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="post">
                        @csrf

                        @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                            </td>
                            <td>{{ $profile->name }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $profiles->appends($filters)->links() !!}
            @else
            {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop