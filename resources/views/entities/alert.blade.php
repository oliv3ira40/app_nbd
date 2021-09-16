@extends('Admin.layout.layout')
@section('title', 'Alerta de exclusão de venda')

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
                        <h6 class="panel-title txt-dark txt-trans-initial">
                            Alerta de exclusão de entidade do tipo:
                            <span class="text-primary font-bold">
                                {{ $data['type_entity']->name }}
                            </span>
                        </h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data['entity'], ['url'=>route('adm.entity.delete')]) !!}
                                {!! Form::hidden('id', null) !!}    

                                <div class="form-group col-md-8">
                                    <label class="control-label mb-10 text-left">
                                        Nome
                                    </label>
                                    <div class="form-control">
                                        {{ $data['entity']->company_name }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        Telefone
                                    </label>
                                    <div class="form-control">
                                        {{ $data['entity']->telephone }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left txt-trans-initial">
                                        Data de fundação
                                    </label>
                                    <div class="form-control">
                                        {{ $data['entity']->foundation_date }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">
                                        CNPJ
                                    </label>
                                    <div class="form-control">
                                        {{ $data['entity']->cnpj }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left txt-trans-initial">
                                        Usuários vinculados (Estes usuários não seram excluídos)
                                    </label>
                                    <div class="form-control">
                                        {{ $data['entity']->UserHasEntity->count() }}
                                    </div>
                                </div>
                                
                                @if ($data['sales'])
                                    <div class="form-group col-md-6">
                                        <p class="text-danger font-bold">
                                            Existem {{ $data['sales'] }} vendas registradas para estar entidade, caso prossiga com a exclusão todas as suas vendas serão excluídas.
                                        </p>
                                    </div>
                                @endif
                                
                                <div class="form-group col-md-12 mb-10">
                                    <div class="checkbox checkbox-danger">
                                        <input id="checkbox2" type="checkbox" name="delete_confirm">
                                        <label for="checkbox2">
                                            Confirmo a exclusão deste registro
                                        </label>
                                        @if ($errors->has('delete_confirm'))
                                            <small class="txt-danger txt-trans-initial font-bold">
                                                {{ $errors->first('delete_confirm') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-block btn-danger font-15 float-right']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection