@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    <div class="row">
        {{-- Funcionários registradas --}}
        <div class="col-md-3">
            <a href="{{ (in_array('adm.employee.list', HelpAdmin::permissionsUser())) ? route('adm.employee.list') : '#' }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                <span class="counter-anim font-22">{{ $data['employees'] }}</span>
                                            </span>
                                            <span class="weight-500 uppercase-font block font-14">Funcionários registradas</span>
                                        </div>
                                        <div class="col-xs-4 text-center pl-0 pr-0 data-wrap-right">
                                            <i class="icon-people data-right-rep-icon txt-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Vendas registradas --}}
        <div class="col-md-3">
            <a href="{{ (in_array('adm.shopkeeper.list_sales', HelpAdmin::permissionsUser())) ? route('adm.shopkeeper.list_sales') : '#' }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                <span class="counter-anim font-22">{{ $data['entity']->Sales->count() }}</span>
                                            </span>
                                            <span class="weight-500 uppercase-font block font-14">Vendas registradas</span>
                                        </div>
                                        <div class="col-xs-4 text-center pl-0 pr-0 data-wrap-right">
                                            <i class="icon-basket-loaded data-right-rep-icon txt-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Cadastrar venda --}}
        <div class="col-md-3">
            <a href="{{ route('adm.shopkeeper.register_sale') }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-22">
                                                ---
                                            </span>
                                            <span class="weight-500 uppercase-font block font-14">
                                                Cadastrar venda
                                            </span>
                                        </div>
                                        <div class="col-xs-4 text-center pl-0 pr-0 data-wrap-right">
                                            <i class="icon-plus data-right-rep-icon txt-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Enviar convite de cadastro--}}
        <div class="col-md-3">
            <a href="{{ route('adm.send_registration_invitation') }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-22">
                                                ---
                                            </span>
                                            <span class="weight-500 uppercase-font block font-14">
                                                Enviar convite de cadastro
                                            </span>
                                        </div>
                                        <div class="col-xs-4 text-center pl-0 pr-0 data-wrap-right">
                                            <i class="icon-share-alt data-right-rep-icon txt-grey"></i>
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
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Ultimas vendas registradas</h6>
                    </div>
                    @if (in_array('adm.shopkeeper.list_sales', HelpAdmin::permissionsUser()))
                        <div class="pull-right">
                            <h6 class="txt-trans-initial">
                                <a href="{{ route('adm.shopkeeper.list_sales') }}" class="txt-primary">
                                    Todas as vendas
                                </a>
                            </h6>
                        </div>
                    @endif
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
                                            <th>Profissional / Escritório</th>
                                            <th>Data da venda</th>
                                            <th>Valor</th>
                                            <th>Código</th>
                                            <th>Cliente</th>
                                            <th>Registrada por</th>
                                            {{-- <th>Ações</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['my_sales'] as $sale)
                                            <tr>
                                                <td>
                                                    {{ $sale->id }}
                                                </td>
                                                <td>
                                                    {{ $sale->Specifier->company_name }}
                                                </td>
                                                <td>
                                                    {{ $sale->purchase_date->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    R$ {{ number_format($sale->value, 2, ",", ".") }}
                                                </td>
                                                <td>
                                                    {{ $sale->sale_code ?? '---' }}
                                                </td>
                                                <td>
                                                    {{ $sale->cpf_or_cnpj_client }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($sale->User) }}
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