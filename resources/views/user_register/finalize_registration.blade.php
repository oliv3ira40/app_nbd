@extends('auth.layout.layout')
@section('title', 'Finalizar registro')

@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper  pa-0">
        <div style="background-color: #f5f5f5; min-height: 452px;" class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">

                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form ml-auto mr-auto no-float" style="width: 600px;">
                            <div style="background-color: white; border-radius: 10px; border: solid 2px #e4e4e4;" class="row ml-0 mr-0">
                                <div class="col-md-12 col-xs-12 mt-10 mb-10 header-auth">
                                    <div class="col-md-6 col-xs-6 pl-0 text-left header-logo">
                                        <a href="{{ route('adm.index') }}">
                                            <img class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-left header-title">
                                        <h4 class="txt-dark mt-10 mb-10 font-20 nonecase-font">Finalizar registro</h4>
                                    </div>
                                </div>
                                <div class="form-wrap col-md-12 col-xs-12">
                                    {!! Form::model($data, ['url'=>route('adm.save_finalize_registration')]) !!}                                            
                                        {!! Form::hidden('user_id', $data['user']->id) !!}
                                        {!! Form::hidden('entity_id', $data['entity']->id) !!}
                                    
                                        <h5 class="mt-20 nonecase-font">
                                            Dados da(o) usuário
                                        </h5>
                                        {{-- Primeiro Nome / Último Nome --}}
                                        <div class="row">
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="user[first_name]">Primeiro Nome*</label>
                                                
                                                @if ($errors->has('user.first_name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.first_name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('user[first_name]', $data['user']->first_name, ['class'=>'form-control', 'id'=>'user[first_name]']) !!}
                                            </div>
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="user[last_name]">Último Nome</label>
                                                
                                                @if ($errors->has('user.last_name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.last_name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('user[last_name]', null, ['class'=>'form-control', 'id'=>'user[last_name]', 'autofocus']) !!}
                                            </div>
                                        </div>
                                        {{-- CPF / Data de nascimento --}}
                                        <div class="row">
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="user[cpf]">CPF*</label>
                                                
                                                @if ($errors->has('user.cpf'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.cpf') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('user[cpf]', $data['user']->cpf, ['class'=>'form-control mask_cpf', 'id'=>'user[cpf]']) !!}
                                            </div>
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="user[date_of_birth]">Data de nascimento*</label>
                                                
                                                @if ($errors->has('user.date_of_birth'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.date_of_birth') }}
                                                    </small>
                                                @endif
                                                {!! Form::date('user[date_of_birth]', null, ['class'=>'form-control', 'id'=>'user[date_of_birth]', 'autofocus']) !!}
                                            </div>
                                        </div>

                                        <h5 class="mt-20 nonecase-font">
                                            Dados da(o) {{ $data['type_of_entity']['name'] }}
                                        </h5>
                                        {{-- Nome fantasia / Razão social --}}
                                        <div class="row">
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="entity[name]">Nome fantasia*</label>
                                                
                                                @if ($errors->has('entity.name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('entity.name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('entity[name]', $data['entity']->name, ['class'=>'form-control', 'id'=>'entity[name]']) !!}
                                            </div>
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="entity[company_name]">Razão social*</label>
                                                
                                                @if ($errors->has('entity.company_name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('entity.company_name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('entity[company_name]', $data['entity']->company_name, ['class'=>'form-control', 'id'=>'entity[company_name]', 'autofocus']) !!}
                                            </div>
                                        </div>
                                        {{-- CNPJ / Data de fundação --}}
                                        @if ($data['type_of_entity']['tag'] == 'office' OR $data['type_of_entity']['tag'] == 'shopkeeper')
                                            <div class="row">
                                                <div class="form-group mb-10 col-md-6">
                                                    <label class="control-label mb-5 nonecase-font" for="entity[cnpj]">CNPJ*</label>
                                                    
                                                    @if ($errors->has('entity.cnpj'))
                                                        <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                            {{ $errors->first('entity.cnpj') }}
                                                        </small>
                                                    @endif
                                                    {!! Form::text('entity[cnpj]', $data['entity']->cnpj, ['class'=>'form-control', 'id'=>'entity[cnpj]']) !!}
                                                </div>
                                                <div class="form-group mb-10 col-md-6">
                                                    <label class="control-label mb-5 nonecase-font" for="entity[foundation_date]">Data de fundação*</label>
                                                    
                                                    @if ($errors->has('entity.foundation_date'))
                                                        <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                            {{ $errors->first('entity.foundation_date') }}
                                                        </small>
                                                    @endif
                                                    {!! Form::date('entity[foundation_date]', $data['entity']->foundation_date, ['class'=>'form-control', 'id'=>'entity[foundation_date]', 'autofocus']) !!}
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group mt-20 text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-block btn-primary">FINALIZAR REGISTRO</button>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                    
                                    <div class="form-group mt-20 text-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($data['user']->skip_record <= 4)
                                                    <a href="{{ route('adm.skip_record', $data['user']->id) }}" class="font-bold">
                                                        Pular registro,
                                                    </a>
                                                @endif
                                                <a class="font-bold text-danger" href="{{ route('adm.logout') }}">SAIR</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            
        </div>
    
    </div>
@endsection