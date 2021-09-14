@extends('Admin.layout.layout')
@section('title', 'Editando Loja')

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
                            {!! Form::model($data, ['url'=>route('adm.shopkeepers.update')]) !!}
                                {!! Form::hidden('id', $data['user']->id) !!}

                                <div class="form-group col-md-12"> 
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Dados Pessoais
                                    </h5>
                                    <div class="col-md-4">
                                        <label for="user[first_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('user.first_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.first_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[first_name]', null, ['class'=>'form-control', 'id'=>'user[first_name]', 'autofocus']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="user[last_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Sobrenome
                                            @if ($errors->has('user.last_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.last_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[last_name]', null, ['class'=>'form-control', 'id'=>'user[last_name]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="user[email]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            E-mail*
                                            @if ($errors->has('user.email'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.email') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::email('user[email]', null, ['class'=>'form-control', 'id'=>'user[email]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <label for="user[telephone]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Telefone
                                            @if ($errors->has('user.telephone'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.telephone') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[telephone]', null, ['class'=>'form-control', 'id'=>'user[telephone]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="user[cpf]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cpf*
                                            @if ($errors->has('user.cpf'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.cpf') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[cpf]', null, ['class'=>'form-control mask_cpf', 'id'=>'user[cpf]']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Escritório
                                    </h5>
                                    <div class="col-md-6">
                                        <label for="shopkeeper[name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('shopkeeper.name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper.name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper[name]', null, ['class'=>'form-control', 'id'=>'shopkeeper[name]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="shopkeeper[company_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Razão social
                                            @if ($errors->has('shopkeeper.company_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper.company_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper[company_name]', null, ['class'=>'form-control', 'id'=>'shopkeeper[company_name]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <label for="shopkeeper[telephone]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Telefone*
                                            @if ($errors->has('shopkeeper.telephone'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper.telephone') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper[telephone]', null, ['class'=>'form-control', 'id'=>'shopkeeper[telephone]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="shopkeeper[foundation_date]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Data de fundação*
                                            @if ($errors->has('shopkeeper.foundation_date'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper.foundation_date') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::date('shopkeeper[foundation_date]', null, ['class'=>'form-control', 'id'=>'shopkeeper[foundation_date]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="shopkeeper[cnpj]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cnpj*
                                            @if ($errors->has('shopkeeper.cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper.cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'shopkeeper[cnpj]']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Endereço do Escritório
                                    </h5>
                                    <div class="col-md-4">
                                        <label for="zip_code" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cep*
                                            @if ($errors->has('shopkeeper_addres.zip_code'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper_addres.zip_code') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper_addres[zip_code]', null, ['class'=>'form-control', 'id'=>'zip_code']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="street" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Rua*
                                            @if ($errors->has('shopkeeper_addres.street'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper_addres.street') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper_addres[street]', null, ['class'=>'form-control', 'id'=>'street']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="neighborhood" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Bairro*
                                            @if ($errors->has('shopkeeper_addres.neighborhood'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper_addres.neighborhood') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper_addres[neighborhood]', null, ['class'=>'form-control', 'id'=>'neighborhood']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="city" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Rua*
                                            @if ($errors->has('shopkeeper_addres.city'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper_addres.city') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper_addres[city]', null, ['class'=>'form-control', 'id'=>'city']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Bairro*
                                            @if ($errors->has('shopkeeper_addres.state'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeeper_addres.state') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('shopkeeper_addres[state]', null, ['class'=>'form-control', 'id'=>'state']) !!}
                                    </div>
                                    {!! Form::hidden('shopkeeper_addres[ibge]', null, ['id'=>'ibge']) !!}
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection