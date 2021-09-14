@extends('Admin.layout.layout')
@section('title', 'Excluindo Grupo')

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
                        <h6 class="panel-title txt-dark">Excluindo Grupo</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($group, ['url'=>route('adm.groups.delete')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-6">
                                    <label class="control-label mb-10 text-left">
                                        Nome
                                    </label>
                                    <div class="form-control">{{ $group->name }}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label mb-10 text-left">
                                        Permissões
                                    </label>
                                    <div class="form-control">{{ $group->Permission->count() }}</div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-block btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection