@extends('Admin.layout.layout')
@section('title', 'Novo relatório')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="txt-trans-initial panel-title txt-dark">Novo relatório</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap row">
                            {!! Form::open(['url'=>route('adm.reports.save'), 'id'=>'form_gerenate_report']) !!}

                                <div class="form-group col-md-12"> 
                                    <div class="col-md-12">
                                        <label for="name" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Nome
                                            @if ($errors->has('name'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('name') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-md-12"> 
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Filtro
                                    </h5>
                                    {{-- Escritórios / Profissionais --}}
                                    <div class="col-md-6">
                                        <label for="prof_and_offices_select" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Escritórios / Profissionais*
                                            @if ($errors->has('prof_and_offices_select'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('prof_and_offices_select') }}
                                                </small>
                                            @endif
                                        </label>

                                        <select multiple id="prof_and_offices_select" class="prof_and_offices_select" name="prof_and_offices_select[]">
                                            @foreach ($data['users_offices'] as $user_office)
                                                @if ($user_office->UserHasEntity != null)
                                                    <option value="{{ $user_office->UserHasEntity->Entity->id }}">
                                                        {{ $user_office->UserHasEntity->Entity->company_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            @foreach ($data['users_professionals'] as $user_professional)
                                                @if ($user_professional->UserHasEntity != null)
                                                    <option value="{{ $user_professional->UserHasEntity->Entity->id }}">
                                                        {{ $user_professional->UserHasEntity->Entity->company_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="col-md-12 pl-0 pr-0">
                                            <a class="select-all-professionals btn btn-xs btn-primary mt-10" href="#">
                                                Adicionar todos
                                            </a> 
                                            <a class="deselect-all-professionals btn btn-xs btn-default mt-10 pull-right" href="#">
                                                Remover todos
                                            </a> 
                                        </div>
                                    </div>

                                    {{-- Lojas --}}
                                    <div class="col-md-6">
                                        <label for="shopkeepers_select" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Lojas*
                                            @if ($errors->has('shopkeepers_select'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopkeepers_select') }}
                                                </small>
                                            @endif
                                        </label>
                                        
                                        <select multiple id="shopkeepers_select" class="shopkeepers_select" name="shopkeepers_select[]">
                                            @foreach ($data['users_shopkeepers'] as $user_shopkeeper)
                                                @if ($user_shopkeeper->UserHasEntity)
                                                    <option value="{{ $user_shopkeeper->UserHasEntity->Entity->id }}">
                                                        {{ $user_shopkeeper->UserHasEntity->Entity->company_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="col-md-12 pl-0 pr-0">
                                            <a class="select-all-shopkeepers btn btn-xs btn-primary mt-10" href="#">
                                                Adicionar todos
                                            </a> 
                                            <a class="deselect-all-shopkeepers btn btn-xs btn-default mt-10 pull-right" href="#">
                                                Remover todos
                                            </a> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 mt-20">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Critérios de busca
                                    </h5>
                                    <div class="col-md-6">
                                        <label for="selected_month" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Período de vendas
                                            @if ($errors->has('selected_month'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('selected_month') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::select('selected_month', [
                                            '01' => 'Janeiro',
                                            '02' => 'Fevereiro',
                                            '03' => 'Março',
                                            '04' => 'Abril',
                                            '05' => 'Maio',
                                            '06' => 'Junho',
                                            '07' => 'Julho',
                                            '08' => 'Agosto',
                                            '09' => 'Setembro',
                                            '10' => 'Outubro',
                                            '11' => 'Novembro',
                                            '12' => 'Dezembro'
                                        ], strftime(date('m')), ['class'=>'form-control', 'id'=>'selected_month']) !!}
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label for="purchase_date" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Data da compra
                                            @if ($errors->has('purchase_date'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('purchase_date') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('purchase_date', null, ['class'=>'form-control date_purchase_date', 'id'=>'purchase_date']) !!}
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label for="shopping_values" class="control-label uppercase-font font-14 mb-10 text-left col-md-12 pl-0">
                                            Tipo de relatório
                                            @if ($errors->has('shopping_values'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('shopping_values') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::select('ranking_types', [
                                            '1' => 'Pontuação',
                                            '2' => 'Vendas',
                                        ], '1', ['class'=>'form-control select2', 'id'=>'user_profile']) !!}
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-12 mt-40">
                                    <h5 class="col-md-12 txt-dark weight-500 txt-trans-initial">
                                        Promoções
                                    </h5>
                                    <div class="col-md-6">
                                        <label for="promotion_period" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Periodo
                                            <small class="wheight-500 font-12">
                                                (DATA DA COMPRA)
                                            </small>
                                            @if ($errors->has('promotion_period'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('promotion_period') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('promotion_period', null, ['class'=>'form-control date_promotion_period']) !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label for="bonus" class="control-label uppercase-font font-14 mb-10 text-left">
                                            Bonus aplicado
                                            <small class="wheight-500 font-12">
                                                (%)
                                            </small>
                                            @if ($errors->has('bonus'))
                                                <small class="txt-danger txt-trans-initial font-bold">
                                                    {{ $errors->first('bonus') }}
                                                </small>
                                            @endif
                                        </label>
                                        {!! Form::text('bonus', null, ['class'=>'form-control', 'id'=>'bonus']) !!}
                                    </div>
                                </div> --}}

                                <div class="form-group col-md-12 mb-0 mt-10">
                                    <div id="invalid_search" style="display: none;" class="col-md-12 mb-10 weight-500 font-16 text-center text-danger">
                                        Busca invalida
                                    </div>
                                    <div id="seeking_compatible_sales" style="display: none;" class="col-md-12 mb-10 weight-500 font-16 text-center text-danger">
                                        Buscando vendas compátiveis
                                        <span class="fa fa-spin fa-refresh"></span>
                                    </div>
                                    <div id="compatible_recorded_sales" style="display: none;" class="col-md-12 mb-10 weight-500 font-16 text-center text-primary">
                                        Vendas registradas compátiveis:
                                        <span id="num_sales_found">??</span>
                                    </div>
                                    <div class="col-md-12">
                                        {!! Form::submit('GERAR RELATÓRIO', ['class'=>'btn btn-xs btn-block btn-primary font-15']) !!}
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
        {!! Form::open(['url'=>route('adm.reports.ajax_get_compatible_sales'), 'id'=>'ajax_get_compatible_sales']) !!}
        {!! Form::close() !!}
    {{-- Forms --}}

@endsection