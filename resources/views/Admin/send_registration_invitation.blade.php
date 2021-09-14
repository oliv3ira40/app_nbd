@extends('Admin.layout.layout')
@section('title', 'Enviar convite de cadastro')

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
                        <h6 class="panel-title txt-dark txt-trans-initial">Enviar convite de cadastro</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.send_invitation')]) !!}
                                {!! Form::hidden('id', null) !!}
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <label for="email" class="control-label txt-trans-initial mb-10 text-left">
                                            E-mail*
                                            <br>
                                            <small class="pl-0">
                                                Enviei para vários e-mails de uma só vez separando-os por virgula. Ex: usuario1@mail.com, usuario2@mail.com, usuario3@mail.com
                                            </small>
                                            @if ($errors->has('email'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::textarea('email', null, ['class'=>'form-control', 'id'=>'email', 'rows'=>'3']) !!}
                                    </div>
                                </div>

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

                                <div class="form-group mb-0 col-md-12">
                                    <div class="col-md-12">
                                        {!! Form::submit('ENVIAR', ['class'=>'btn btn-xs btn-block btn-primary']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (isset(session()->all()['emails_already_sent']))
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark txt-trans-initial">Esses usuários já foram convidados</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div  class="panel-wrapper collapse in">
                        <div  class="panel-body pl-15">
                            <ul class="uo-list">
                                @foreach (session()->all()['emails_already_sent'] as $email)
                                    <li class="mb-10 col-md-4">{{ $email }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection