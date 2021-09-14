@extends('auth.layout.layout')
@section('title', 'Login')


@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper pa-0">
        {{-- <header class="sp-header">
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">
                    Não possui um registro?
                </span>
                <a class="inline-block btn btn-primary btn-rounded btn-outline" style="text-transform: unset;" href="{{ route('adm.register_new_user') }}">
                    Faça seu cadastro
                </a>
            </div>
            <div class="clearfix"></div>
        </header> --}}
        
        <div style="background-color: #f5f5f5; min-height: 452px;" class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">

                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form ml-auto mr-auto no-float">
                            <div style="background-color: white; border-radius: 10px; border: solid 2px #e4e4e4;" class="row ml-0 mr-0">
                                <div class="col-md-12">
                                    <div class="col-md-12 col-xs-12 pl-0 pr-0 mt-10 mb-10 header-auth">
                                        <div class="col-md-6 col-xs-6 pl-0 text-left header-logo">
                                            <a href="{{ route('adm.index') }}">
                                                <img class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xs-6 text-left header-title">
                                            <h4 class="txt-dark mt-10 mb-10">Login</h4>
                                        </div>
                                    </div>

                                    @if (Session::has('notification'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable alert-style-1">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <i class="zmdi zmdi-info-outline"></i>
                                                    {{ Session::get('notification') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-wrap">
                                        {!! Form::open(['url'=> 'login']) !!}

                                            <div class="form-group">
                                                <label class="control-label nonecase-font mb-5" for="email">E-mail</label>
                                                {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'autofocus']) !!}
                                                @if ($errors->has('email'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('email') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-5" for="password">Senha</label>
                                                {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                                @if ($errors->has('password'))
                                                    <small class="txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('password') }}
                                                    </small>
                                                @endif

                                                <a class="txt-primary block mt-5 mb-5 pull-right font-12 font-bold" href="{{ route('adm.reset_password') }}">
                                                    Esqueceu a senha?
                                                </a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
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
    
    </div>
@endsection