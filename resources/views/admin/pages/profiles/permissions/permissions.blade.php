@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('profiles.index') }}" class=""> / Perfis</a></li>
    </ol>

    <h1>Permissões do Perfil <strong>{{$profile->name}}</strong> 
        <a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" class="POST" class="form-inline">
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
                        <th>Nome</th>
                        <th width='250'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td width='10px;'>
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $permissions->appends($filters)->links() !!}
            @else
            {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop