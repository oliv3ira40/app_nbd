@extends('auth.layout.layout')
@section('title', 'Registre-se')


@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">Já possui uma conta?</span>
                <a class="inline-block btn btn-primary btn-rounded btn-outline" href="{{ route('login') }}">Login</a>
            </div>
            <div class="clearfix"></div>
        </header>
        
        <div style="background-color: #f5f5f5; min-height: 452px;" class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">

                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form ml-auto mr-auto no-float">
                            <div style="background-color: white; border-radius: 10px; border: solid 2px #e4e4e4;" class="row ml-0 mr-0">
                                <div class="col-md-12 col-xs-12 mt-10 mb-10 header-auth">
                                    <div class="col-md-6 col-xs-6 pl-0 text-left header-logo">
                                        <a href="{{ route('adm.index') }}">
                                            <img class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xs-6 text-left header-title">
                                        <h4 class="txt-dark mt-10 mb-10 font-20">Registre-se</h4>
                                    </div>
                                </div>
                                <div class="form-wrap col-md-12 col-xs-12">
                                    {!! Form::open(['url'=> 'register']) !!}

                                        <div class="form-group">
                                            <label class="control-label mb-5" for="first_name">Nome</label>
                                            
                                            @if ($errors->has('first_name'))
                                                <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                    {{ $errors->first('first_name') }}
                                                </small>
                                            @endif
                                            {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name', 'autofocus']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-5" for="last_name">Sobrenome</label>
                                                
                                            @if ($errors->has('last_name'))
                                                <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                    {{ $errors->first('last_name') }}
                                                </small>
                                            @endif
                                            {!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
                                        </div>

                                            
                                        <div class="form-group">
                                            <label class="control-label mb-5 nonecase-font" for="email">E-mail</label>
                                            
                                            @if ($errors->has('email'))
                                                <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            @endif
                                            {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-5" for="password">Senha</label>
                                            
                                            @if ($errors->has('password'))
                                                <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                    {{ $errors->first('password') }}
                                                </small>
                                            @endif
                                            {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-5 nonecase-font" for="password_confirmation">Confirme sua senha</label>
                                            
                                            @if ($errors->has('password_confirmation'))
                                                <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                    {{ $errors->first('password_confirmation') }}
                                                </small>
                                            @endif
                                            {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                                        </div>
                                            
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
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