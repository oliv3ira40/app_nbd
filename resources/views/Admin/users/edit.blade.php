@extends('Admin.layout.layout')
@section('title', 'Editando usuário')

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
                        <h6 class="panel-title txt-dark">Editando usuário</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($user, ['url'=>route('adm.users.update')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-12">
                                    <div class="col-md-3">
                                        <label for="first_name" class="control-label txt-trans-initial mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('first_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('first_name') }}
                                                </small>
                                            @endif
                                        </label>

                                        {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="last_name" class="control-label txt-trans-initial mb-10 text-left">
                                            Sobrenome
                                            @if ($errors->has('last_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('last_name') }}
                                                </small>
                                            @endif
                                        </label>

                                        {!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
                                    </div>

                                    <div class="col-md-3">
                                        <label for="email" class="control-label txt-trans-initial mb-10 text-left">
                                            E-mail*
                                            @if ($errors->has('email'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="telephone" class="control-label txt-trans-initial mb-10 text-left">
                                            Telefone
                                            @if ($errors->has('telephone'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('telephone') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('telephone', null, ['class'=>'form-control', 'id'=>'telephone']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-3">
                                        <label for="password" class="control-label txt-trans-initial mb-10 text-left">
                                            Senha*
                                            @if ($errors->has('password'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('password') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="password_confirmation" class="control-label txt-trans-initial mb-10 text-left">
                                            Confirme a senha*
                                            @if ($errors->has('password_confirmation'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('password_confirmation') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                                    </div>

                                    <!-- <div class="col-md-3">
                                        <label for="login" class="control-label txt-trans-initial mb-10 text-left">
                                            Login
                                            @if ($errors->has('login'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('login') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('login', null, ['class'=>'form-control', 'id'=>'login']) !!}
                                    </div> -->
    
                                    <div class="col-md-6">
                                        <label for="group_id" class="control-label mb-10 text-left">
                                            Grupo
                                            @if ($errors->has('group_id'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('group_id') }}
                                                </small>
                                            @endif
                                        </label>
                                        @if (in_array('adm.users.edit_group', HelpAdmin::permissionsUser()))
                                            <select id="group_id" name="group_id" class="form-control">
                                                @foreach ($groups as $group)
                                                    @if ($user->group_id == $group->id)
                                                        <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @else
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @else
                                            <div disabled class="form-control">
                                                {{ $user->Group->name }}
                                            </div>
                                        @endif
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

                                <div class="form-group mb-0 col-md-12">
                                    <div class="col-md-12">
                                        {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-primary']) !!}
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