@extends('Admin.layout.layout')
@section('title', 'Bloqueando usuário')

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
                        <h6 class="panel-title txt-dark">Bloqueando usuário</h6>
                        <small class="font-bold pl-0">Este usuário não terá acesso ao sistema</small>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($user, ['url'=>route('adm.users.delete')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Nome
                                    </label>
                                    <div class="form-control">{{ $user->first_name }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Sobrenome
                                    </label>
                                    <div class="form-control">{{ $user->last_name }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        E-mail
                                    </label>
                                    <div class="form-control">{{ $user->email }}</div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    {!! Form::submit('Bloquear', ['class'=>'btn btn-xs btn-block btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection