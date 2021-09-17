@extends('Admin.layout.layout')
@section('title', 'Lista de Escritórios')

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
                    <h6 class="panel-title txt-dark">Lista de Escritórios</h6>
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
                                    @foreach ($data['offices_users'] as $office)
                                        <tr>
                                            <td>
                                                {{ $office->id }}
                                            </td>
                                            <td>
                                                {{ $office->company_name }}
                                            </td>
                                            <td>
                                                {{ ($office->foundation_date) ? date('d-m-Y', strtotime($office->foundation_date)) : '---' }}
                                            </td>
                                            <td>
                                                @if ($office->cnpj == null)
                                                    <span class="txt-danger weight-500">
                                                        Cadastro incompleto
                                                    </span>
                                                    @else
                                                    <span class="txt-primary weight-500">
                                                        {{ $office->cnpj }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ ($office->created_at != null) ? $office->created_at->format('d/m/Y H:i') : '---' }}
                                            </td>
                                            <td>
                                                {{ $office->SpecifierSales->count() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('adm.offices.edit', $office->id) }}" class="my-btn btn btn-warning">
                                                    Editar
                                                </a>
                                                <a href="{{ route('adm.entity.alert', $office->id) }}" class="my-btn btn btn-danger">
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