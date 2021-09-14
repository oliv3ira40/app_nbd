@extends('Admin.layout.layout')
@section('title', 'Lista de permissões')

@section('content')

    <div class="row heading-bg height-auto pt-0 pb-0">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 onclick="javascript:history.back()">
                <a class="text-primary font-bold" href="#">Voltar</a>
            </h5>
        </div>
        
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.created_permissions.new') }}">Nova permissão</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Lista de permissões</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30" >
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Rota</th>
                                            <th>Data de criação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Rota</th>
                                            <th>Data de criação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($list_permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->route }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('adm.created_permissions.edit', $permission->id) }}" class="btn btn-xs btn-warning">Editar</a>    
                                                    <a href="{{ route('adm.created_permissions.alert', $permission->id) }}" class="btn btn-xs btn-danger">Excluir</a>    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>

@endsection