@extends('auth.layout.layout')
@section('title', 'Registre-se')

@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="form-group mb-10 mb-0 pull-right">
                <span class="inline-block pr-10">Já possui uma conta?</span>
                <a class="inline-block btn btn-primary btn-rounded btn-outline" href="{{ route('login') }}">Login</a>
            </div>
            <div class="clearfix"></div>
        </header>
        
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
                                        <h4 class="txt-dark mt-10 mb-10 font-20 nonecase-font">Registre-se</h4>
                                    </div>
                                </div>
                                <div class="form-wrap col-md-12 col-xs-12">
                                    {!! Form::open(['url'=>route('adm.save_new_user')]) !!}
                                        <h5 class="mt-20">Dados pessoais</h5>
                                        <div class="mt-20 row">
                                            {{-- Noma fantasia --}}
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="entity[name]">Noma fantasia*</label>
                                                
                                                @if ($errors->has('entity.name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('entity.name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('entity[name]', null, ['class'=>'form-control', 'id'=>'entity[name]', 'autofocus']) !!}
                                            </div>
                                            {{-- Razão social --}}
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="entity[company_name]">Razão social*</label>
                                                
                                                @if ($errors->has('entity.company_name'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('entity.company_name') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('entity[company_name]', null, ['class'=>'form-control', 'id'=>'entity[company_name]']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- CPF --}}
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="user[cpf]">CPF*</label>
                                                
                                                @if ($errors->has('user.cpf'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.cpf') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('user[cpf]', null, ['class'=>'form-control mask_cpf', 'id'=>'user[cpf]', 'autofocus']) !!}
                                            </div>
                                            {{-- CNPJ --}}
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="control-label mb-5 nonecase-font" for="entity[cnpj]">CNPJ</label>
                                                
                                                @if ($errors->has('entity.cnpj'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('entity.cnpj') }}
                                                    </small>
                                                @endif
                                                {!! Form::text('entity[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'entity[cnpj]']) !!}
                                            </div>
                                        </div>
                                            
                                        {{-- E-mail --}}
                                        <div class="row">
                                            <div class="form-group mb-10 col-md-12">
                                                <label class="control-label mb-5 nonecase-font" for="user[email]">E-mail*</label>
                                                
                                                @if ($errors->has('user.email'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.email') }}
                                                    </small>
                                                @endif
                                                {!! Form::email('user[email]', null, ['class'=>'form-control', 'id'=>'user[email]']) !!}
                                            </div>
                                        </div>

                                        {{-- Senha --}}
                                        <div class="row">
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="pull-left control-label mb-5 nonecase-font" for="user[password]">Senha de acesso*</label>
                                                
                                                @if ($errors->has('user.password'))
                                                    <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.password') }}
                                                    </small>
                                                @endif
                                                {!! Form::password('user[password]', ['class'=>'form-control', 'id'=>'user[password]']) !!}
                                            </div>
                                            <div class="form-group mb-10 col-md-6">
                                                <label class="pull-left control-label mb-5 nonecase-font" for="user[password_confirmation]">Confirme sua senha*</label>
                                                
                                                @if ($errors->has('user.password_confirmation]'))
                                                    <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user.password_confirmation]') }}
                                                    </small>
                                                @endif
                                                {!! Form::password('user[password_confirmation]', ['class'=>'form-control', 'id'=>'user[password_confirmation]']) !!}
                                            </div>
                                        </div>

                                        {{-- Tipo de usuário --}}
                                        {{-- <div class="row">
                                            <div class="form-group mb-10 col-md-12">
                                                <label class="control-label mb-5 nonecase-font" for="type_of_entity">
                                                    Tipo de usuário*
                                                </label>
                                                
                                                @if ($errors->has('type_of_entity'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('type_of_entity') }}
                                                    </small>
                                                @endif
                                                <select name="type_of_entity" id="" class="form-control" id="type_of_entity">
                                                    <option value="null">Selecione...</option>
                                                    @foreach ($data['type_of_entity'] as $type)
                                                        <option value="{{ $type->tag }}">
                                                            {{ $type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="form-group mt-20 text-center">
                                            <button type="submit" class="btn btn-block btn-primary">Avançar</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            
        </div>
    
    </div>
@endsection