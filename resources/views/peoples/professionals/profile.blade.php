@extends('Admin.layout.layout')
@section('title', 'Perfil - Profissional')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Perfil - Profissional</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::model($data, ['url'=>route('adm.professional.update_profile')]) !!}
                                <div class="form-group col-md-12"> 
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Dados Pessoais
                                    </h5>
                                    <div class="col-md-6">
                                        <label for="user[first_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome*
                                            @if ($errors->has('user.first_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.first_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[first_name]', null, ['class'=>'form-control', 'id'=>'user[first_name]', 'autofocus']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user[last_name]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Sobrenome
                                            @if ($errors->has('user.last_name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.last_name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('user[last_name]', null, ['class'=>'form-control', 'id'=>'user[last_name]']) !!}
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
                                        {!! Form::email('user[email]', null, ['class'=>'form-control', 'id'=>'user[email]']) !!}
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
                                
                                <div id="div_update_password" style="display: none;" class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label for="user[password]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Senha
                                            @if ($errors->has('user.password'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('user.password') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::password('user[password]', ['class'=>'form-control', 'id'=>'user[password]']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user[password_confirmation]" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Confirme sua senha
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
                                    <div class="col-md-12">
                                        <label for="check_update_password" class="row control-label col-md-12 uppercase-font font-14 mb-0 text-left">
                                            Atualizar senha
                                        </label>
                                        <input type="checkbox" id="check_update_password" class="form-control js-switch js-switch-1" data-size="small" data-color="#4e9de6"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <div class="col-md-12">
                                        {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if ($data['office_has_professional'] != null)
        @php
            $office = $data['office_has_professional']->Office;
        @endphp
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="txt-trans-initial panel-title txt-dark">Vínculo profissional</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap row">
                                {!! Form::model($data, ['url'=>route('adm.professional.alert_remove_link')]) !!}
                                    {!! Form::hidden('office_id', $data['office_has_professional']->office_id) !!}
                                    {!! Form::hidden('professional_id', $data['office_has_professional']->professional_id) !!}

                                    <div class="form-group col-md-12">
                                        <div class="col-md-4">
                                            <label class="control-label uppercase-font font-14 mb-10 text-left">
                                                Loja
                                            </label>
                                            <div class="form-control">
                                                {{ $office->name }}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label uppercase-font font-14 mb-10 text-left">
                                                Telefone
                                            </label>
                                            <div class="form-control">
                                                {{ $office->telephone }}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label uppercase-font font-14 mb-10 text-left">
                                                CNPJ
                                            </label>
                                            <div class="form-control">
                                                {{ $office->cnpj }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 mb-0">
                                        <div class="col-md-12">
                                            {!! Form::submit('Remover vinculo', ['class'=>'btn btn-xs btn-block btn-warning font-15']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

@endsection