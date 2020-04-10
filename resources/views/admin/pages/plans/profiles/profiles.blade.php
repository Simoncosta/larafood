@extends('adminlte::page')

@section('title', "Perfis do Plano {$plan->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item" href="{{ route('plans.index') }}" class=""> / Planos</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('plans.profiles', $plan->id) }}" class="active"> / Perfis</a></li>
    </ol>

    <h1>Perfis do Plano <strong>{{$plan->name}}</strong></h1> 
    
    <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark">ADD NOVO PERFIL</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td width='10px;'>
                            <a href="{{ route('profiles.profile.detach', [$profile->id, $profile->id]) }}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                    @endforeach
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