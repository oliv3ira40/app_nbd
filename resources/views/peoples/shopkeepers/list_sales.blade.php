@extends('Admin.layout.layout')
@section('title', 'Vendas registradas')

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
                        <h6 class="panel-title txt-dark txt-trans-initial font-14">Vendas registradas</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <label for="">Especificadores</label>
                                <select class="form-control select2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="{{ route('adm.shopkeeper.list_sales') }}">Exibir todos</option>
                                    @foreach ($data['specifiers'] as $user)
                                        @if (isset($filters['specid']) AND $filters['specid'] == $user->UserHasEntity->Entity->id)
                                            <option selected value="{{ route('adm.shopkeeper.list_sales', ['specid'=>$user->UserHasEntity->Entity->id]) }}">
                                                {{ $user->UserHasEntity->Entity->company_name }}
                                            </option>
                                        @else
                                            <option value="{{ route('adm.shopkeeper.list_sales', ['specid'=>$user->UserHasEntity->Entity->id]) }}">
                                                {{ $user->UserHasEntity->Entity->company_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Status</label>
                                <select class="form-control select2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="{{ route('adm.shopkeeper.list_sales') }}">Exibir todos</option>
                                    <option value="{{ route('adm.shopkeeper.list_sales', ['status'=>1]) }}">
                                        Validada
                                    </option>
                                    <option value="{{ route('adm.shopkeeper.list_sales', ['status'=>0]) }}">
                                        Pendente
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Especificadores</label>
                                <select class="form-control select2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="{{ route('adm.shopkeeper.list_sales') }}">Exibir todos</option>
                                    @foreach ($data['specifiers'] as $user)
                                        @if (isset($filters['specid']) AND $filters['specid'] == $user->UserHasEntity->Entity->id)
                                            <option selected value="{{ route('adm.shopkeeper.list_sales', ['specid'=>$user->UserHasEntity->Entity->id]) }}">
                                                {{ $user->UserHasEntity->Entity->company_name }}
                                            </option>
                                        @else
                                            <option value="{{ route('adm.shopkeeper.list_sales', ['specid'=>$user->UserHasEntity->Entity->id]) }}">
                                                {{ $user->UserHasEntity->Entity->company_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30" >
                                    <thead>
                                        <tr>
                                            <th>Especificador</th>
                                            <th>Data da venda</th>
                                            <th>Valor</th>
                                            <th>Código</th>
                                            <th>Cliente</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Especificador</th>
                                            <th>Data da venda</th>
                                            <th>Valor</th>
                                            <th>Código</th>
                                            <th>Cliente</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['sales'] as $sale)
                                            <tr>
                                                <td id="specifier_td_{{ $sale->id }}" data-specifier_id="{{ $sale->Specifier->id }}">
                                                    {{ $sale->Specifier->company_name }}
                                                </td>
                                                <td>
                                                    {{ $sale->purchase_date->format('d/m/Y') }}
                                                </td>
                                                <td id="value_td_{{ $sale->id }}" data-value_id="R$ {{ number_format($sale->value, 2, ",", ".") }}">
                                                    R$ {{ number_format($sale->value, 2, ",", ".") }}
                                                </td>
                                                <td>
                                                    {{ $sale->sale_code ?? '---' }}
                                                </td>
                                                <td>
                                                    {{ $sale->cpf_or_cnpj_client }}
                                                </td>
                                                <td>
                                                    @if ($sale->validated != null)
                                                        <span class="text-success">
                                                            Validada
                                                        </span>
                                                    @else
                                                        <span class="text-warning">
                                                            Pendente
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs btns_validates" data-sale_id="{{ $sale->id }}" alt="default" data-toggle="modal" data-target="#responsive-modal">
                                                        Validar
                                                    </button>
                                                    <a href="{{ route('adm.sales.alert', $sale->id) }}" class="btn btn-danger btn-xs">
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

    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title">Validando venda</h5>
                </div>
                {!! Form::open(['url'=>route('adm.sales.validate_sale')]) !!}
                    {!! Form::hidden('sale_id', null, ['id'=>'sale_id_modal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="specifier_modal" class="control-label mb-10">Especificador</label>
                                    <div class="form-control" id="specifier_modal"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value_modal" class="control-label mb-10">Valor</label>
                                    <div class="form-control" id="value_modal"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Validar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection