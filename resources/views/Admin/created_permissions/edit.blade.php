@extends('Admin.layout.layout')
@section('title', 'Editando permissão')

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
                        <h6 class="panel-title txt-dark">Editando permissão</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($permission, ['url'=>route('adm.created_permissions.update')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-6">
                                    <label for="name" class="control-label mb-10 text-left">
                                        Nome*
                                        @if ($errors->has('name'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('name') }}
                                            </small>
                                        @endif
                                    </label>
                                    {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="route" class="control-label mb-10 text-left">
                                        Rota*
                                        @if ($errors->has('route'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('route') }}
                                            </small>
                                        @endif
                                    </label>
                                    {!! Form::text('route', null, ['class'=>'form-control', 'id'=>'route']) !!}
                                </div>
                                <div class="form-group col-md-12 mb-10">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                        <label for="checkbox2">
                                            Permanecer na página
                                        </label>
                                    </div>	
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection