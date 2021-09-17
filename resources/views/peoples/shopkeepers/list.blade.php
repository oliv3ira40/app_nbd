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
                    <h6 class="panel-title txt-dark txt-trans-initial">Lista de Lojas</h6>
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
                                        <th>DT de fundação</th>
                                        <th>Cnpj</th>
                                        <th>DT de criação</th>
                                        <th>Vendas</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['shopkeepers_users'] as $shopkeeper)
                                        <tr>
                                            <td>
                                                {{ $shopkeeper->id }}
                                            </td>
                                            <td>
                                                {{ $shopkeeper->company_name }}
                                            </td>
                                            <td>
                                                {{ ($shopkeeper->foundation_date) ? date('d-m-Y', strtotime($shopkeeper->foundation_date)) : '---' }}
                                            </td>
                                            <td>
                                                @if ($shopkeeper->cnpj == null)
                                                    <span class="txt-danger weight-500">
                                                        Cadastro incompleto
                                                    </span>
                                                    @else
                                                    <span class="txt-primary weight-500">
                                                        {{ $shopkeeper->cnpj }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ ($shopkeeper->created_at != null) ? $shopkeeper->created_at->format('d/m/Y H:i') : '---' }}
                                            </td>
                                            <td>
                                                {{ $shopkeeper->Sales->count() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('adm.shopkeepers.edit', $shopkeeper->id) }}" class="my-btn btn btn-warning">
                                                    Editar
                                                </a>
                                                <a href="{{ route('adm.entity.alert', $shopkeeper->id) }}" class="my-btn btn btn-danger">
                                                    Excluir
                                                </a>
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