@extends('Admin.layout.layout')
@section('title', 'Novas permissões')

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
                        <h6 class="panel-title txt-dark">Novas permissões</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            {!! Form::open(['url'=>route('adm.created_permissions.save')]) !!}
                                <div class="form-group">
                                    <label for="textarea" class="control-label mb-10 text-left">
                                        Permissões*
                                        <small>Ex: nome1=rota1/nome2=rota2</small>
                                        @if ($errors->has('textarea'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('textarea') }}
                                            </small>
                                        @endif
                                    </label>
                                    {!! Form::textarea('textarea', null, ['class'=>'form-control', 'id'=>'textarea', 'rows'=>'5']) !!}
                                </div>
                                <div class="form-group mb-10">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                        <label for="checkbox2">
                                            Permanecer na página
                                        </label>
                                    </div>	
                                </div>

                                <div class="form-group mb-0">
                                    {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection