@extends('Admin.layout.layout')
@section('title', 'Excluíndo funcionário: '. $data['entity']->name)

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
                        <h6 class="panel-title txt-dark">Excluíndo funcionário: {{ $data['entity']->name }}</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data['user'], ['url'=>route('adm.employee.delete')]) !!}
                                {!! Form::hidden('user_id', $data['user']->id) !!}    

                                {{-- CPF / E-mail / CPF --}}
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="first_name" class="control-label txt-trans-initial mb-10 text-left">
                                            Nome
                                        </label>
                                        <div class="form-control">
                                            {{ $data['user']->first_name }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email" class="control-label txt-trans-initial mb-10 text-left">
                                            E-mail
                                        </label>
                                        <div class="form-control">
                                            {{ $data['user']->email }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cpf" class="control-label txt-trans-initial mb-10 text-left">
                                            CPF
                                        </label>
                                        <div class="form-control">
                                            {{ $data['user']->cpf }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('EXCLUIR', ['class'=>'btn btn-sm btn-block btn-danger']) !!}
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