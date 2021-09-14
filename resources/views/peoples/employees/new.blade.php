@extends('Admin.layout.layout')
@section('title', 'Novo funcionário: '. $data['entity']->name)

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
                        <h6 class="panel-title txt-dark">Novo funcionário: {{ $data['entity']->name }}</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.employee.save')]) !!}
                                
                                {{-- CPF / E-mail / Senha --}}
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-3">
                                        <label for="first_name" class="control-label txt-trans-initial mb-10 text-left">
                                            Nome*
                                        </label>
                                        {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name', 'autofocus']) !!}
                                        @if ($errors->has('first_name'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('first_name') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email" class="control-label txt-trans-initial mb-10 text-left">
                                            E-mail*
                                        </label>
                                        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                        @if ($errors->has('email'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('email') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cpf" class="control-label txt-trans-initial mb-10 text-left">
                                            CPF
                                        </label>
                                        {!! Form::text('cpf', null, ['class'=>'form-control mask_cpf', 'id'=>'cpf']) !!}
                                        @if ($errors->has('cpf'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('cpf') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="password" class="control-label txt-trans-initial mb-10 text-left">
                                            Senha*
                                        </label>
                                        {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                        @if ($errors->has('password'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('password') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="password_confirmation" class="control-label txt-trans-initial mb-10 text-left">
                                            Confirme a senha*
                                        </label>
                                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                                        @if ($errors->has('password_confirmation'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('password_confirmation') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                
                                @if (in_array('adm.employee.list', HelpAdmin::permissionsUser()))
                                    <div class="form-group col-md-12 mb-10">
                                        <div class="col-md-12">
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                                <label for="checkbox2">
                                                    Permanecer na página
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('SALVAR', ['class'=>'btn btn-sm btn-block btn-primary']) !!}
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