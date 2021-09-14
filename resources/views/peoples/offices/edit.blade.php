@extends('Admin.layout.layout')
@section('title', 'Editando escritório')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Editando escritório</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data, ['url'=>route('adm.offices.update')]) !!}
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
                                        <label for="office[name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('office.name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office.name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office[name]', null, ['class'=>'form-control', 'id'=>'office[name]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="office[company_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Razão social
                                            @if ($errors->has('office.company_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office.company_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office[company_name]', null, ['class'=>'form-control', 'id'=>'office[company_name]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4">
                                        <label for="office[telephone]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Telefone*
                                            @if ($errors->has('office.telephone'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office.telephone') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office[telephone]', null, ['class'=>'form-control', 'id'=>'office[telephone]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="office[foundation_date]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Data de fundação*
                                            @if ($errors->has('office.foundation_date'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office.foundation_date') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::date('office[foundation_date]', null, ['class'=>'form-control', 'id'=>'office[foundation_date]']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="office[cnpj]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cnpj*
                                            @if ($errors->has('office.cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office.cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'office[cnpj]']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Endereço do Escritório
                                    </h5>
                                    <div class="col-md-4">
                                        <label for="zip_code" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cep*
                                            @if ($errors->has('office_addres.zip_code'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office_addres.zip_code') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office_addres[zip_code]', null, ['class'=>'form-control', 'id'=>'zip_code']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="street" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Rua*
                                            @if ($errors->has('office_addres.street'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office_addres.street') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office_addres[street]', null, ['class'=>'form-control', 'id'=>'street']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="neighborhood" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Bairro*
                                            @if ($errors->has('office_addres.neighborhood'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office_addres.neighborhood') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office_addres[neighborhood]', null, ['class'=>'form-control', 'id'=>'neighborhood']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="city" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Rua*
                                            @if ($errors->has('office_addres.city'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office_addres.city') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office_addres[city]', null, ['class'=>'form-control', 'id'=>'city']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Bairro*
                                            @if ($errors->has('office_addres.state'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('office_addres.state') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('office_addres[state]', null, ['class'=>'form-control', 'id'=>'state']) !!}
                                    </div>
                                    {!! Form::hidden('office_addres[ibge]', null, ['id'=>'ibge']) !!}
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