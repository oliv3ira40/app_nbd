@extends('Admin.layout.layout')
@section('title', 'Alerta de exclusão de venda')

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
                        <h6 class="panel-title txt-dark txt-trans-initial">Alerta de exclusão de venda</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($sale, ['url'=>route('adm.sales.delete')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Profissional / Escritório
                                    </label>
                                    <div class="form-control">
                                        {{ $sale->Specifier->company_name }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Valor
                                    </label>
                                    <div class="form-control">
                                        R$ {{ number_format($sale->value, 2, ",", ".") }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Cliente
                                    </label>
                                    <div class="form-control">
                                        {{ $sale->cpf_or_cnpj_client }}
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    {!! Form::submit('EXCLUIR', ['class'=>'btn btn-xs btn-block btn-danger font-bold']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection