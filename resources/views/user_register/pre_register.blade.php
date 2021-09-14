@extends('auth.layout.layout')
@section('title', 'Pré registro')


@section('content')
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    
    <div class="wrapper pa-0">
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
                                <div class="col-md-12">
                                    <div class="col-md-12 col-xs-12 pl-0 pr-0 mt-10 mb-20 header-auth">
                                        <div class="col-md-6 col-xs-6 pl-0 text-left header-logo">
                                            <a href="{{ route('adm.index') }}">
                                                <img class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xs-6 text-left header-title">
                                            <h4 class="txt-dark mt-10 mb-10 nonecase-font">Pré registro</h4>
                                        </div>
                                    </div>

                                    <div class="form-wrap">
                                        {!! Form::open(['url'=>route('adm.check_pre_register')]) !!}
                                            <div class="form-group">
                                                <label class="control-label nonecase-font mb-5" for="user_profile">
                                                    Selecione o seu perfil de usuário
                                                </label>
                                                {!! Form::select('user_profile', [
                                                    'null' => 'Selecione...',
                                                    'professional' => 'Profissional',
                                                    'office' => 'Escritório',
                                                    // 'shopkeeper' => 'Lojista'
                                                ], null, ['class'=>'form-control select2', 'id'=>'user_profile']) !!}

                                                @if ($errors->has('user_profile'))
                                                    <small class="pl-0 txt-danger txt-trans-initial font-12 font-bold">
                                                        {{ $errors->first('user_profile') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group text-center">
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
    
    </div>
@endsection