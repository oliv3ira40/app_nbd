@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')
    <div class="row">
        {{-- Usuários vinculados --}}
        <div class="col-md-3">
            <a href="{{ route('adm.office.link_professional') }}">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-16">
                                                <span class="counter-anim txt-dark font-22">{{ $data['office']->ProfessionalLink->count() }}</span>
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">
                                                Profissionais vinculados
                                            </span>
                                        </div>
                                        <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
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
        
        {{-- Valor de compra --}}
        <div class="col-md-3">
            <a href="javascript:void(0);">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-16">
                                                Entre os
                                                <span class="counter-anim txt-primary font-22">
                                                    {{ $data['my_ranking_shopp_values']['approximate_position'] }}
                                                </span>
                                                melhores
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">
                                                Valor de compra
                                            </span>
                                        </div>
                                        <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
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
        <div class="col-md-3">
            <a href="javascript:void(0);">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block font-16">
                                                Entre os
                                                <span class="counter-anim txt-primary font-22">
                                                    {{ $data['my_ranking_num_sales']['approximate_position'] }}
                                                </span>
                                                melhores
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">
                                                Número de vendas
                                            </span>
                                        </div>
                                        <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
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
        @if (in_array('adm.office.shopping_list', HelpAdmin::permissionsUser()))
            <div class="col-md-3">
                <a href="{{ route('adm.office.shopping_list') }}">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block">
                                                    <span class="counter-anim font-22">{{ $data['office']->SpecifierSales->count() }}</span>
                                                </span>
                                                <span class="weight-500 uppercase-font block font-15">
                                                    Compras registradas
                                                </span>
                                            </div>
                                            <div class="col-xs-3text-center  pl-0 pr-0 data-wrap-right">
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
                        <h6 class="panel-title txt-dark uppercase-font font-13">Ultimas compras registradas</h6>
                    </div>
                    @if (in_array('adm.office.shopping_list', HelpAdmin::permissionsUser()))
                        <div class="pull-right">
                            <h6 class="txt-trans-initial">
                                <a href="{{ route('adm.office.shopping_list') }}" class="txt-primary">
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
                                        <th>Profissional</th>
                                        <th>Data / período da compra</th>
                                        <th>Data de registro</th>
                                        <th>Registrada por</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['my_shoppings'] as $my_shopping)
                                            <tr>
                                                <td>
                                                    {{ $my_shopping->id }}
                                                </td>
                                                <td>
                                                    {{ $my_shopping->Specifier->company_name }}
                                                </td>
                                                <td>
                                                    @if ($my_shopping->purchase_date != null)
                                                        {{ $my_shopping->purchase_date->format('d/m/Y') }}
                                                    @else
                                                        {{ $my_shopping->start_sales_period->format('d/m/Y') }}
                                                        -
                                                        {{ $my_shopping->end_sales_period->format('d/m/Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $my_shopping->created_at->format('d/m/Y H:i') }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($my_shopping->User) }}
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