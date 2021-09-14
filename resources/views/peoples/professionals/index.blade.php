@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    <div class="row">

        {{-- Valor de compra --}}
        <div class="col-lg-4 col-xs-12">
            <a href="javascript:void(0);">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-16">
                                                Entre os
                                                <span class="counter-anim txt-primary font-22">
                                                    {{ $data['my_ranking_shopp_values']['approximate_position'] }}
                                                </span>
                                                primeiros
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">
                                                Valor de compra
                                            </span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-list data-right-rep-icon txt-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Número de vendas --}}
        <div class="col-lg-4 col-xs-12">
            <a href="javascript:void(0);">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-16">
                                                Entre os
                                                <span class="counter-anim txt-primary font-22">
                                                    {{ $data['my_ranking_num_sales']['approximate_position'] }}
                                                </span>
                                                primeiros
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">
                                                Número de vendas
                                            </span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-list data-right-rep-icon txt-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Compras registradas --}}
        @if (in_array('adm.professional.shopping_list', HelpAdmin::permissionsUser()))
            <div class="col-lg-4 col-xs-12">
                <a href="{{ route('adm.professional.shopping_list') }}">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block">
                                                    <span class="counter-anim font-22">{{ $data['my_shoppings']->count() }}</span>
                                                </span>
                                                <span class="weight-500 uppercase-font block font-15">
                                                    Compras registradas
                                                </span>
                                            </div>
                                            <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
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
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="uppercase-font txt-dark font-15">Ultimas compras registradas</h6>
                    </div>
                    @if (in_array('adm.professional.shopping_list', HelpAdmin::permissionsUser()))
                        <div class="pull-right">
                            <h6 class="txt-trans-initial">
                                <a href="{{ route('adm.professional.shopping_list') }}" class="txt-primary">
                                    Todas as compras
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
                                            <th>Data da compra</th>
                                            <th>Cliente</th>
                                            <th>Loja</th>
                                            <th>Registrada por</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['my_shoppings'] as $shopping)
                                            <tr>
                                                <td>
                                                    {{ $shopping->id }}
                                                </td>
                                                <td>
                                                    {{ $shopping->purchase_date->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    {{ $shopping->cpf_or_cnpj_client }}
                                                </td>
                                                <td>
                                                    {{ $shopping->Entity->name }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($shopping->User) }}
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

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="uppercase-font txt-dark font-15">Compras por loja</h6>
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
                                        <th>Loja</th>
                                        <th>Última compra</th>
                                        <th>Direcionadas ao profissional</th>
                                        <th>Direcionadas ao escritório</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['shoppings_by_store'] as $shopping_by_store)
                                            <tr>
                                                <td>
                                                    {{ $shopping_by_store->name }}
                                                </td>
                                                <td>
                                                    @if ($shopping_by_store->last_shopping->purchase_date != null)
                                                        {{ $shopping_by_store->last_shopping->purchase_date->format('d/m/Y') }}
                                                    @else
                                                        {{ $shopping_by_store->last_shopping->start_sales_period->format('d/m/Y') }}
                                                        -
                                                        {{ $shopping_by_store->last_shopping->end_sales_period->format('d/m/Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $shopping_by_store->for_the_professional }}
                                                </td>
                                                <td>
                                                    {{ $shopping_by_store->for_the_office }}
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
    </div> --}}
@endsection