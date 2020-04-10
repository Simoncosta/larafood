@extends('adminlte::page')

@section('title', "Permissões Disponíveis Perfil {$profile->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li><a class="breadcrumb-item" href="{{ route('admin.index') }}">Dashboard</a></li>
        <li><a class="breadcrumb-item active" href="{{ route('profiles.index') }}" class=""> / Perfis</a></li>
    </ol>

    <h1>Permissões Disponíveis Perfil <strong>{{$profile->name}}</strong></h1> 
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>

    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.permissions.available', $profile->id) }}" class="POST" class="form-inline">
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
                <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="post">
                        @csrf

                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            </td>
                            <td>{{ $permission->name }}</td>
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
            {!! $permissions->appends($filters)->links() !!}
            @else
            {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop