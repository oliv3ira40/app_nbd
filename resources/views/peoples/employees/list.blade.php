@extends('Admin.layout.layout')
@section('title', 'Funcionários - '.$data['entity']->name)

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
                    <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.employee.new') }}">Novo funcionário</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark nonecase-font">Funcionários - {{ $data['entity']->name }}</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>CPF</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>CPF</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['employees'] as $employee)
                                            <tr>
                                                <td>
                                                    {{ $employee->id }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($employee) }}
                                                </td>
                                                <td>
                                                    {{ $employee->email }}
                                                </td>
                                                <td>
                                                    {{ $employee->cpf }}
                                                </td>
                                                <td>
                                                    @if (in_array('adm.employee.edit', HelpAdmin::permissionsUser()))
                                                        <a href="{{ route('adm.employee.edit', $employee->id) }}" class="my-btn btn btn-xs btn-default">Editar</a>    
                                                    @endif

                                                    @if (in_array('adm.employee.alert', HelpAdmin::permissionsUser()))
                                                        <a href="{{ route('adm.employee.alert', $employee->id) }}" class="my-btn btn btn-xs btn-danger">Excluir</a>    
                                                    @endif
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