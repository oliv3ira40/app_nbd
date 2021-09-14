@extends('Admin.layout.layout')
@section('title', 'Finalizar Cadastro')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Finalize o seu cadastro</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.professional.save_finalize_registration')]) !!}
                                {!! Form::hidden('id', $data['user']->id) !!}

                                <div class="form-group col-md-12"> 
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Dados Pessoais
                                    </h5>
                                    <div class="col-md-6">
                                        <label for="user[first_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Primeiro nome*
                                            @if ($errors->has('user.first_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.first_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[first_name]', $data['user']->first_name, ['class'=>'form-control', 'id'=>'user[first_name]', 'autofocus']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user[last_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Último nome
                                            @if ($errors->has('user.last_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.last_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[last_name]', $data['user']->last_name, ['class'=>'form-control', 'id'=>'user[last_name]']) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="user[email]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            E-mail*
                                            @if ($errors->has('user.email'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.email') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::email('user[email]', $data['user']->email, ['class'=>'form-control', 'id'=>'user[email]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="professional[cnpj]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Cnpj*
                                            @if ($errors->has('professional.cnpj'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('professional.cnpj') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('professional[cnpj]', null, ['class'=>'form-control mask_cnpj', 'id'=>'professional[cnpj]']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
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