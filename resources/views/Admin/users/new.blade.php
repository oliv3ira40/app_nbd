@extends('Admin.layout.layout')
@section('title', 'Novo usuário')

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
                        <h6 class="panel-title txt-dark">Novo usuário</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.users.save')]) !!}
                                
                                {{-- CPF / E-mail / Senha --}}
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-3">
                                        <label for="user[cpf]" class="control-label txt-trans-initial mb-10 text-left">
                                            CPF*
                                            @if ($errors->has('user.cpf'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.cpf') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[cpf]', null, ['class'=>'form-control mask_cpf', 'id'=>'user[cpf]', 'autofocus']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="user[email]" class="control-label txt-trans-initial mb-10 text-left">
                                            E-mail*
                                            @if ($errors->has('user.email'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.email') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::email('user[email]', null, ['class'=>'form-control', 'id'=>'user[email]']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="user[password]" class="control-label txt-trans-initial mb-10 text-left">
                                            Senha*
                                            @if ($errors->has('user.password'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.password') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('user[password]', ['class'=>'form-control', 'id'=>'user[password]']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="user[password_confirmation]" class="control-label txt-trans-initial mb-10 text-left">
                                            Confirme a senha*
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
                                    <div class="form-group col-md-3">
                                        <label for="entity[name]" class="control-label txt-trans-initial mb-10 text-left">
                                            Noma fantasia*
                                            @if ($errors->has('entity.name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('entity[name]', null, ['class'=>'form-control', 'id'=>'entity[name]', 'autofocus']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="entity[company_name]" class="control-label txt-trans-initial mb-10 text-left">
                                            Razão social*
                                            @if ($errors->has('entity.company_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.company_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('entity[company_name]', null, ['class'=>'form-control', 'id'=>'entity[company_name]', 'autofocus']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="entity[cnpj]" class="control-label txt-trans-initial mb-10 text-left">
                                            CNPJ
                                            @if ($errors->has('entity.cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('entity.cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('entity[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'entity[cnpj]', 'autofocus']) !!}
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="user[group_id]" class="control-label mb-10 text-left">
                                            Grupo
                                            @if ($errors->has('user.group_id'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.group_id') }}
                                                </small>
                                            @endif
                                        </label>
                                        <select id="user[group_id]" name="user[group_id]" class="form-control">
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                @if (in_array('adm.users.list', HelpAdmin::permissionsUser()))
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