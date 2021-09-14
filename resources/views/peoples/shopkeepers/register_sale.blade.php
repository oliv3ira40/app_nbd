@extends('Admin.layout.layout')
@section('title', 'Registrar venda')

@section('content')

    <div class="row heading-bg height-auto pt-0 pb-0">
        <div class="col-md-12">
            <h5 onclick="javascript:history.back()" style="float: left;">
                <a class="text-primary font-bold" href="#">Voltar</a>
            </h5>

            <h5 style="float: right;">
                <a target="_blank" class="text-primary font-bold nonecase-font" href="{{ route('adm.send_registration_invitation') }}">
                    Enviar convite de cadastro
                </a>
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark txt-trans-initial">
                            Registrar venda(s)
                            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="">Selecione...</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 1) }}">1</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 5) }}">5</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 10) }}">10</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 20) }}">20</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 30) }}">30</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 40) }}">40</option>
                                <option value="{{ route('adm.shopkeeper.register_sale', 50) }}">50</option>
                            </select>
                        </h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            {!! Form::open(['url'=>route('adm.shopkeeper.save_sales_record')]) !!}

                                <div id="num_multiple_sales" class="hide">{{ $data['multiple_sales'] }}</div>
                                @if ($data['multiple_sales'] != null)
                                    @for ($num_sales = 1; $num_sales <= $data['multiple_sales']; $num_sales++)
                                        @if ($data['multiple_sales'] != 1)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="panel-title txt-trans-initial font-bold">
                                                        Venda {{ $num_sales }}
                                                    </h6>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            {{-- Valor da venda (R$)* --}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sales[{{ $num_sales }}][value]" class="control-label txt-trans-initial mb-10 text-left">
                                                        Valor da venda (R$)*
                                                    </label>
                                                    
                                                    {!! Form::text('sales['.$num_sales.'][value]', null, ['class'=>'form-control currency', 'id'=>'sales['.$num_sales.'][value]', 'autofocus']) !!}
                                                    
                                                    @if ($errors->has('sales.'.$num_sales.'.value'))
                                                        <small class="txt-danger txt-trans-initial font-bold">
                                                            {{ $errors->first('sales.'.$num_sales.'.value') }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- Data da venda* --}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sales[{{ $num_sales }}][purchase_date]" class="control-label txt-trans-initial mb-10 text-left">
                                                        Data da venda*
                                                    </label>
                                                    
                                                    {!! Form::date('sales['.$num_sales.'][purchase_date]', \Carbon\Carbon::now(), ['class'=>'form-control', 'id'=>'sales['.$num_sales.'][purchase_date]']) !!}
                                                    
                                                    @if ($errors->has('sales.'.$num_sales.'.purchase_date'))
                                                        <small class="txt-danger txt-trans-initial font-bold">
                                                            {{ $errors->first('sales.'.$num_sales.'.purchase_date') }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- Especificador* --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sales[{{ $num_sales }}][specifier_id]" class="control-label txt-trans-initial mb-10 text-left">
                                                        Especificador*
                                                        <span class="text-info link_information_{{ $num_sales }}"></span>
                                                    </label>
                                                    
                                                    {!! Form::select('sales['.$num_sales.'][specifier_id]', [''=>'Selecione...'], null, ['id'=>'sales['.$num_sales.'][specifier_id]', 'class'=>'form-control search_specifiers_'.$num_sales]) !!}
                                                    
                                                    @if ($errors->has('sales.'.$num_sales.'.specifier_id'))
                                                        <small class="txt-danger txt-trans-initial font-bold">
                                                            {{ $errors->first('sales.'.$num_sales.'.specifier_id') }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- Cliente (CPF OU CNPJ)* --}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sales[{{ $num_sales }}][cpf_or_cnpj_client]" class="control-label txt-trans-initial mb-10 text-left">
                                                        Cliente (CPF OU CNPJ)*
                                                    </label>
                                                    
                                                    {!! Form::text('sales['.$num_sales.'][cpf_or_cnpj_client]', null, ['id'=>'sales['.$num_sales.'][cpf_or_cnpj_client]', 'class'=>'form-control mask_cpf_or_cnpj']) !!}
                                                    
                                                    @if ($errors->has('sales.'.$num_sales.'.cpf_or_cnpj_client'))
                                                        <small class="txt-danger txt-trans-initial font-bold">
                                                            {{ $errors->first('sales.'.$num_sales.'.cpf_or_cnpj_client') }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- Código da venda --}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sales[{{ $num_sales }}][sale_code]" class="control-label txt-trans-initial mb-10 text-left">
                                                        Código da venda
                                                    </label>
                                                    
                                                    {!! Form::text('sales['.$num_sales.'][sale_code]', null, ['id'=>'sales['.$num_sales.'][sale_code]', 'class'=>'form-control', 'autocomplete'=>'off']) !!}
                                                    
                                                    @if ($errors->has('sales.'.$num_sales.'.sale_code'))
                                                        <small class="txt-danger txt-trans-initial font-bold">
                                                            {{ $errors->first('sales.'.$num_sales.'.sale_code') }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row hide div_professional_link_{{ $num_sales }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label mb-0 txt-trans-initial">
                                                        Usuário vinculado a 
                                                        <span class="weight-500 span_office_{{ $num_sales }}">??</span>, confirme o especificador desta venda
                                                    </label>
                                                    <div class="radio">
                                                        <input type="radio" name="sales[{{ $num_sales }}][confirmed_specifier]" id="radio_office_{{ $num_sales }}" value="" checked>
                                                        <label for="radio_office_{{ $num_sales }}">
                                                            Escritório:
                                                            <span class="weight-500 span_office_{{ $num_sales }}">??</span>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="sales[{{ $num_sales }}][confirmed_specifier]" id="radio_user_{{ $num_sales }}" value="">
                                                        <label for="radio_user_{{ $num_sales }}">
                                                            Usuário:
                                                            <span class="weight-500 span_user_{{ $num_sales }}">??</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endif

                                {{-- Permanecer nesta página --}}
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                                <label for="checkbox2">
                                                    Permanecer nesta página
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SALVAR --}}
                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('SALVAR', ['class'=>'btn btn-sm btn-block btn-primary']) !!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Forms --}}
        {!! Form::open(['url'=>route('adm.sales.get_professional_and_offices_ajax'), 'id'=>'form_get_professional_and_offices_ajax']) !!}
        {!! Form::close() !!}
        
        {!! Form::open(['url'=>route('adm.get_professional_link_ajax'), 'id'=>'form_get_professional_link_ajax']) !!}
        {!! Form::close() !!}
    {{-- Forms --}}

@endsection