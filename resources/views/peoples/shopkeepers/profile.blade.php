@extends('Admin.layout.layout')
@section('title', 'Perfil - Lojista')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Perfil - Lojista</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data, ['url'=>route('adm.shopkeeper.update_profile')]) !!}
                                
                                <div class="form-group col-md-12"> 
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Dados pessoais do usuário
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

                                <div id="div_update_password" style="display: none;" class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="user[password]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Senha*
                                            @if ($errors->has('user.password'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.password') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('user[password]', ['class'=>'form-control', 'id'=>'user[password]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user[password_confirmation]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Confirme sua senha*
                                            @if ($errors->has('user.password_confirmation'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.password_confirmation') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('user[password_confirmation]', ['class'=>'form-control', 'id'=>'user[password_confirmation]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <label for="check_update_password" class="row control-label col-md-12 uppercase-font font-14 mb-0 text-left">
                                            Atualizar senha
                                        </label>
                                        {!! Form::checkbox('check_update_password', 1, false, ['id'=>'check_update_password', 'class'=>'form-control js-switch js-switch-1', 'data-size'=>'small', 'data-color'=>'#4e9de6']) !!}
                                        {{-- <input type="checkbox" id="check_update_password" class="form-control js-switch js-switch-1" data-size="small" data-color="#4e9de6"/> --}}
                                    </div>
                                </div>

                                <div style="margin-top: 20px;" class="form-group col-md-12">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Dados da Loja
                                    </h5>
                                    <div class="col-md-12">
                                        <label for="entity[company_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Razão social*
                                            @if ($errors->has('entity.company_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.company_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('entity[company_name]', null, ['class'=>'form-control', 'id'=>'entity[company_name]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="entity[foundation_date]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Data de fundação
                                            @if ($errors->has('entity.foundation_date'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.foundation_date') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::date('entity[foundation_date]', null, ['class'=>'form-control', 'id'=>'entity[foundation_date]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="entity[cnpj]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cnpj*
                                            @if ($errors->has('entity.cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('entity[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'entity[cnpj]']) !!}
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-12">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Endereço da Loja
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
                                </div> --}}

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('ATUALIZAR', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
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