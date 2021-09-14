@extends('Admin.layout.layout')
@section('title', 'Lista de Grupos')

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
                    <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.groups.new') }}">Novo grupo</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Lista de Grupos</h6>
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
                                            <th>Permissões</th>
                                            <th>Data de cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Permissões</th>
                                            <th>Data de cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($groups as $group)
                                            <tr>
                                                <td>
                                                    <span style="background: {{ $group->tag_color }}" class="label label-danger">
                                                        {{ $group->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $group->Permission->count() }}
                                                </td>
                                                <td class="font-bold">{{ $group->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('adm.groups.edit', $group->id) }}" class="btn btn-xs btn-warning">Editar</a>    
                                                    <a href="{{ route('adm.groups.alert', $group->id) }}" class="btn btn-xs btn-danger">Excluir</a>    
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