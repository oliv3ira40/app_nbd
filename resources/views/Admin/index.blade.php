@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    @if (HelpAdmin::IsUserDeveloper())
        <div class="row">
            {{-- Usuários --}}
            <div class="col-lg-4 col-xs-12">
                <a href="{{ route('adm.users.list') }}">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{ $data['users']->total() }}</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Usuários</span>
                                            </div>
                                            <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Grupos --}}
            <div class="col-lg-4 col-xs-12">
                <a href="{{ route('adm.groups.list') }}">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim">{{ $data['groups']->total() }}</span></span>
                                                <span class="weight-500 uppercase-font block">Grupos</span>
                                            </div>
                                            <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Permissões criadas --}}
            <div class="col-lg-4 col-xs-12">
                <a href="{{ route('adm.created_permissions.list') }}">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim">{{ $data['created_permissions']->count() }}</span></span>
                                                <span class="weight-500 uppercase-font block">Permissões criadas</span>
                                            </div>
                                            <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-list data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Usuários</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap mt-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Grupo</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['users'] as $user)
                                                <tr>
                                                    <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                        {{ HelpAdmin::completName($user) }}
                                                    </td>
                                                    <td style="color:{{ ($user->deleted_at != null) ? 'red' : '' }}">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td style="color:{{ ($user->deleted_at != null) ? 'red' : $user->Group->tag_color }}" class="weight-500">
                                                        {{ $user->Group->name }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('adm.users.edit', $user->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="Editar">
                                                            <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                        </a>
                                                        @if ($user->deleted_at != null)
                                                            <a href="{{ route('adm.users.to_restore', $user->id) }}" data-toggle="tooltip" data-original-title="Restaurar">
                                                                <i class="fa fa-refresh text-primary"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('adm.users.alert', $user->id) }}" data-toggle="tooltip" data-original-title="Excluir">
                                                                <i class="fa fa-close text-danger"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <ul class="col-md-12 pagination pagination-sm mt-0 mb-0 pr-0 text-right">
                                        {!! $data['users']->links() !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Grupos</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap mt-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Tag</th>
                                            <th>Permissões</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['groups'] as $group)
                                                <tr>
                                                    <td>
                                                        {{ $group->id }}
                                                    </td>
                                                    <td style="color: {{ $group->tag_color }}">
                                                        {{ $group->name }}
                                                    </td>
                                                    <td>
                                                        {{ $group->tag }}
                                                    </td>
                                                    <td>
                                                        {{ count($group->Permission) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('adm.groups.edit', $group->id) }}" class="mr-25" data-toggle="tooltip" data-original-title="Editar">
                                                            <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                        </a>
                                                        <a href="{{ route('adm.groups.alert', $group->id) }}" data-toggle="tooltip" data-original-title="Excluir">
                                                            <i class="fa fa-close text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    <ul class="col-md-12 pagination pagination-sm mt-0 mb-0 pr-0 text-right">
                                        {!! $data['groups']->links() !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection