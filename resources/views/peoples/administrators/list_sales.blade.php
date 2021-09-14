@extends('Admin.layout.layout')
@section('title', 'Lista de vendas registradas')

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
                        <h6 class="panel-title txt-dark txt-trans-initial font-14">Lista de profissionais cadastrados</h6>
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
                                            <th>Profissional / Escritório</th>
                                            <th>Data / período da venda</th>
                                            <th>Data de registro</th>
                                            <th>Registrada por</th>
                                            {{-- <th>Ações</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Profissional / Escritório</th>
                                            <th>Data / período da venda</th>
                                            <th>Data de registro</th>
                                            <th>Registrada por</th>
                                            {{-- <th>Ações</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
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