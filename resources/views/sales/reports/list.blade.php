@extends('Admin.layout.layout')
@section('title', 'Lista de relatórios')

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
                <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.reports.new') }}">Novo relatório</a>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lista de relatórios</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display pb-30" data-order="false">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Criada por</th>
                                        <th>Data de criação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Criada por</th>
                                        <th>Data de criação</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data['reports'] as $report)
                                        <tr>
                                            <td>
                                                {{ $report->id }}
                                            </td>
                                            <td>
                                                {{ $report->name }}
                                            </td>
                                            <td>
                                                {{ HelpAdmin::completName($report->User) }}
                                            </td>
                                            <td>
                                                {{ $report->created_at->format('d/m/Y H:i:s') }}
                                            </td>
                                            <td>
                                                <a download href="{{ asset(HelpAdmin::getStorageUrl().$report->data_path) }}" class="my-btn btn btn-primary">
                                                    Baixar
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

{{-- @if (HelpAdmin::IsUserDeveloper())
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Ranking por número de vendas</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_2" class="table table-hover display pb-30" data-order="false">
                                    <thead>
                                        <tr>
                                            <th>Entidade</th>
                                            <th>Vendas registradas</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Entidade</th>
                                            <th>Vendas registradas</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['ranking_num_sales'] as $key => $entity)
                                            <tr>
                                                <td>
                                                    {{ HelpSales::getEntity($key)->name }}
                                                </td>
                                                <td>
                                                    {{ $entity['shoppings_num'] }}
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

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Ranking por número de vendas</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_3" class="table table-hover display pb-30" data-order="false">
                                    <thead>
                                        <tr>
                                            <th>Entidade</th>
                                            <th>Vendas registradas</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Entidade</th>
                                            <th>Vendas registradas</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['ranking_values'] as $key => $entity)
                                            <tr>
                                                <td>
                                                    {{ HelpSales::getEntity($key)->name }}
                                                </td>
                                                <td>
                                                    R$ {{ number_format($entity['amount'], 2, ",", ".") }}
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
@endif --}}

@endsection