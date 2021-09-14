@extends('Admin.layout.layout')
@section('title', 'Profissional registrados')

@section('content')

    <div class="row heading-bg height-auto pt-0 pb-0">
        <div class="col-md-3">
            <h5 onclick="javascript:history.back()">
                <a class="text-primary font-bold" href="#">Voltar</a>
            </h5>
        </div>
        
        <div class="col-md-9">
            <ol class="breadcrumb">
                <li>
                    <a style="opacity: 1;" class="text-primary font-bold nonecase-font" href="{{ route('adm.send_registration_invitation') }}">Enviar convite de cadastro</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark nonecase-font">Profissionais registrados</h6>
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
                                        @foreach ($data['prof_unlinked_to_entity'] as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($user) }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->cpf }}
                                                </td>
                                                <td>
                                                    @if ($user->ProfessionalLink == null)
                                                        @if (in_array('adm.office.new_link_professional', HelpAdmin::permissionsUser()))
                                                            <a href="{{ route('adm.office.new_link_professional', $user->id) }}" class="my-btn btn btn-xs btn-primary">
                                                                Vincular profissional
                                                            </a>
                                                        @endif
                                                    @else
                                                        <div class="my-btn btn btn-xs btn-warning">
                                                            Já vinculado
                                                        </div>
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
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark nonecase-font">Profissionais vinculados ao escritório </h6>
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
                                        @foreach ($data['prof_linked_to_entity'] as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($user) }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->cpf }}
                                                </td>
                                                <td>
                                                    @if (in_array('adm.office.alert_link_professional', HelpAdmin::permissionsUser()))
                                                        <a href="{{ route('adm.office.alert_link_professional', $user->id) }}" class="my-btn btn btn-xs btn-danger">
                                                            Remover vinculo
                                                        </a>    
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