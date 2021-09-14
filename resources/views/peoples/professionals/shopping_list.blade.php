@extends('Admin.layout.layout')
@section('title', 'Lista de compras')

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
                    <h6 class="panel-title txt-dark txt-trans-initial font-14">Lista de compras</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30" >
                                <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>Data da compra</th>
                                        <th>Cliente</th>
                                        <th>Loja</th>
                                        <th>Registrada por</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th>#</th>
                                        <th>Data da compra</th>
                                        <th>Cliente</th>
                                        <th>Loja</th>
                                        <th>Registrada por</th>
                                    </tr>
                                </tfoot>
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

@endsection