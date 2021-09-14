@extends('Admin.layout.layout')
@section('title', 'Novo Grupo')

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
                        <h6 class="panel-title txt-dark">Novo Grupo</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.groups.save')]) !!}
                                
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="hierarchy_level" class="control-label txt-trans-initial mb-10 text-left">
                                                Nível hierárquico*
                                                @if ($errors->has('hierarchy_level'))
                                                    <small class="txt-danger txt-trans-initial font-bold">
                                                        {{ $errors->first('hierarchy_level') }}
                                                    </small>
                                                @endif
                                            </label>
                                            {!! Form::text('hierarchy_level', null, ['class'=>'form-control', 'id'=>'hierarchy_level']) !!}
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="name" class="control-label txt-trans-initial mb-10 text-left">
                                                Nome*
                                                @if ($errors->has('name'))
                                                    <small class="txt-danger txt-trans-initial font-bold">
                                                        {{ $errors->first('name') }}
                                                    </small>
                                                @endif
                                            </label>
                                            {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'first_name']) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="tag" class="control-label txt-trans-initial mb-10 text-left">
                                                Tag*
                                                @if ($errors->has('tag'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('tag') }}
                                                </small>
                                                @endif
                                            </label>
                                            {!! Form::text('tag', null, ['class'=>'form-control']) !!}
                                        </div>

                                        <div class="col-md-6">
                                            <label for="tag_color" class="control-label txt-trans-initial mb-10 text-left">
                                                Cor*
                                                @if ($errors->has('tag_color'))
                                                    <small class="txt-danger txt-trans-initial font-bold">
                                                        {{ $errors->first('tag_color') }}
                                                    </small>
                                                @endif
                                            </label>
                                            <div class="colorpicker input-group colorpicker-component">
                                                <input id="tag_color" type="text" name="tag_color" value="#000000" class="form-control" />
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="permissions" class="control-label txt-trans-initial mb-10 text-left">
                                            Permissões
                                            @if ($errors->has('permissions'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('permissions') }}
                                                </small>
                                            @endif
                                        </label>
                                        <select id='pre-selected-options' name="permissions[]" multiple='multiple'>
                                            @foreach ($created_permissions as $permission)
                                                <option value='{{ $permission->id }}'>{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-10 col-md-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                        <label for="checkbox2">
                                            Permanecer na página
                                        </label>
                                    </div>	
                                </div>

                                <div class="form-group mb-0 col-md-12">
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