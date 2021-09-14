@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    <div class="row">

        {{-- Usuários --}}
        <div class="col-md-4">
            <a href="{{ route('adm.users.list') }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                <span class="counter-anim">
                                                    {{ $data['users']->count() }}
                                                </span>
                                            </span>
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

        {{-- Vendas registradas --}}
        <div class="col-md-4">
            <a href="{{ route('adm.sales.list') }}">
                <div class="panel panel-default card-view pa-0" style="height: 114px;">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                <span class="counter-anim font-22">
                                                    {{ $data['sales']->count() }}
                                                </span>
                                            </span>
                                            <span class="weight-500 uppercase-font block font-15">Vendas registradas</span>
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
        {{-- Enviar convite de cadastro --}}
        <div class="col-md-4">
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
                                            <span class="weight-500 uppercase-font block font-15">
                                                Enviar convite de cadastro
                                            </span>
                                        </div>
                                        <div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
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
                    <div class="pull-right">
                        <h6 class="txt-trans-initial">
                            <a href="{{ route('adm.sales.list') }}" class="txt-primary">
                                Todas as vendas
                            </a>
                        </h6>
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
                                        <th>Profissional / Escritório</th>
                                        <th>Data da compra / período</th>
                                        <th>Data de registro</th>
                                        <th>Registrada por</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $count = 0; @endphp
                                        @foreach ($data['sales'] as $sale)
                                            <tr>
                                                <td>
                                                    {{ $sale->id }}
                                                </td>
                                                <td>
                                                    {{ $sale->Specifier->company_name }}
                                                </td>
                                                <td>
                                                    @if ($sale->purchase_date != null)
                                                        {{ $sale->purchase_date->format('d/m/Y') }}
                                                    @else
                                                        {{ $sale->start_sales_period->format('d/m/Y') }}
                                                        -
                                                        {{ $sale->end_sales_period->format('d/m/Y') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $sale->created_at->format('d/m/Y H:i') }}
                                                </td>
                                                <td>
                                                    {{ HelpAdmin::completName($sale->User) }}
                                                </td>
                                            </tr>
                                            @php
                                                $count++;
                                                if ($count == 10) break;
                                            @endphp
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