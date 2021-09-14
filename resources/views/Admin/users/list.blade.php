@extends('Admin.layout.layout')
@section('title', 'Lista de Usuários')

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
                    <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.users.new') }}">Novo usuário</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Lista de Usuários</h6>
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
                                            <th>Grupos</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th>Data de cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Grupos</th>
                                            <th>Status</th>
                                            <th>Data de cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                        @if (HelpAdmin::IsUserDeveloper($user))
                                            @if (HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                <tr>
                                                    <td>
                                                        {{ $user->id }}
                                                    </td>
                                                    <td>
                                                        {{ HelpAdmin::completName($user) }}
                                                    </td>
                                                    <td style="color: {{ $user->Group->tag_color }};" class="font-bold">
                                                        {{ $user->Group->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        @if ($user->trashed())
                                                            <span class="txt-danger">Bloqueado</span>
                                                        @else
                                                            <span class="txt-success">Ativo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ ($user->created_at != null) ? $user->created_at->format('d/m/Y H:i') : '---' }}
                                                    </td>
                                                    <td>
                                                        @if ($user->trashed())
                                                            @if (in_array('adm.users.to_restore', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                                <a href="{{ route('adm.users.to_restore', $user->id) }}" class="my-btn btn btn-xs btn-primary">Restaurar</a>    
                                                            @endif
                                                        @else
                                                            @if (in_array('adm.users.edit', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                                <a href="{{ route('adm.users.edit', $user->id) }}" class="my-btn btn btn-xs btn-default">Editar</a>    
                                                            @endif

                                                            @if (in_array('adm.users.alert', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                                <a href="{{ route('adm.users.alert', $user->id) }}" class="my-btn btn btn-xs btn-danger">Bloquear</a>    
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($user) }}
                                                </td>
                                                <td style="color: {{ $user->Group->tag_color }};" class="font-bold">
                                                    {{ $user->Group->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    @if ($user->trashed())
                                                        <span class="txt-danger">Bloqueado</span>
                                                    @else
                                                        <span class="txt-success">Ativo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ ($user->created_at != null) ? $user->created_at->format('d/m/Y H:i') : '---' }}
                                                </td>
                                                <td>
                                                    @if ($user->trashed())
                                                        @if (in_array('adm.users.to_restore', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                            <a href="{{ route('adm.users.to_restore', $user->id) }}" class="my-btn btn btn-xs btn-primary">Restaurar</a>    
                                                        @endif
                                                    @else
                                                        @if (in_array('adm.users.edit', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                            <a href="{{ route('adm.users.edit', $user->id) }}" class="my-btn btn btn-xs btn-default">Editar</a>    
                                                        @endif

                                                        @if (in_array('adm.users.alert', HelpAdmin::permissionsUser()) OR HelpAdmin::IsUserDeveloper(\Auth::user()))
                                                            <a href="{{ route('adm.users.alert', $user->id) }}" class="my-btn btn btn-xs btn-danger">Bloquear</a>    
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
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