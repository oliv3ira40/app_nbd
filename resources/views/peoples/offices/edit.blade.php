@extends('Admin.layout.layout')
@section('title', 'Editando escritório')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Editando Loja</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data['office'], ['url'=>route('adm.offices.update')]) !!}
                                {!! Form::hidden('id', $data['office']->id) !!}
                                <div class="form-group col-md-12">
                                    <div class="col-md-8">
                                        <label for="company_name" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome
                                            @if ($errors->has('company_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('company_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('company_name', null, ['class'=>'form-control', 'id'=>'company_name', 'autofocus']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="telephone" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Telefone
                                            @if ($errors->has('telephone'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('telephone') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('telephone', null, ['class'=>'form-control mask_telefone', 'id'=>'telephone']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <label for="foundation_date" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Data de fundação
                                            @if ($errors->has('foundation_date'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('foundation_date') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::date('foundation_date', null, ['class'=>'form-control', 'id'=>'foundation_date']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cnpj" class="control-label uppercase-font font-14 mb-10 text-left">
                                            CNPJ
                                            @if ($errors->has('cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('cnpj', null, ['class'=>'form-control mask_cnpj', 'id'=>'cnpj']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="#">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                {{ $data['user_has_entity'] }}
                                            </span>
                                            <span class="weight-500 uppercase-font block">Usuários vinculados</span>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">
                                                {{ $data['sales'] }}
                                            </span>
                                            <span class="weight-500 uppercase-font block">Vendas registradas</span>
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
@endsection