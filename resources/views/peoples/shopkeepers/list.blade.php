@extends('Admin.layout.layout')
@section('title', 'Lista de Lojas')

@section('content')

<div class="row heading-bg height-auto pt-0 pb-0">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 onclick="javascript:history.back()">
            <a class="text-primary font-bold" href="#">Voltar</a>
        </h5>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lista de Lojas</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display pb-30" data-order"false">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Cnpj</th>
                                        <!--<th>Ações</th>-->
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Cnpj</th>
                                        <!--<th>Ações</th>-->
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data['shopkeepers_users'] as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->UserHasEntity->Entity->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->UserHasEntity->Entity->cnpj ?? '---' }}
                                            </td>
                                            <!--<td>-->
                                            <!--    {{ ($user->created_at != null) ? $user->created_at->format('d/m/Y H:i') : '---' }}-->
                                            <!--</td>-->
                                            <!--<td>-->
                                            <!--    @if ($user->UserHasEntity->Entity == null)-->
                                            <!--        <span class="txt-danger weight-500">-->
                                            <!--            Cadastro incompleto-->
                                            <!--        </span>-->
                                            <!--    @else-->
                                            <!--        <a href="{{ route('adm.shopkeepers.edit', $user->id) }}" class="my-btn btn btn-warning">-->
                                            <!--            Editar-->
                                            <!--        </a>-->
                                            <!--        <a href="{{ route('adm.users.alert', $user->id) }}" class="my-btn btn btn-danger">-->
                                            <!--            Bloquear-->
                                            <!--        </a>-->
                                            <!--    @endif-->
                                            <!--</td>-->
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