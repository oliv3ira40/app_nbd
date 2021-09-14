@extends('Admin.layout.layout')
@section('title', 'Ranking')

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
                        <h6 class="panel-title txt-dark">Ranking</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display pb-30" data-order"false">
                                    <thead>
                                        <tr>
                                            <th>Posição no ranking</th>
                                            <th>Nome do arquiteto</th>
                                            <th>Nome do escritório de arquitetura</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Posição no ranking</th>
                                            <th>Nome do arquiteto</th>
                                            <th>Nome do escritório de arquitetura</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php $count = 1; @endphp
                                        @foreach ($data['ranking']['overall_rating_of_user_points'] as $professional_office => $value)
                                            @php
                                                $entity = App\Models\Entities\Entity::find($professional_office);
                                                $user_has_entity = $entity->UserHasEntity->pluck('user_id');
                                                $user = App\Models\Admin\User::whereIn('id', $user_has_entity)->where('group_for_entity_id', 1)->first()
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $count++ }}
                                                </td>
                                                <td>
                                                    {{ $entity->name }}
                                                </td>
                                                <td>
                                                    @if ($user->ProfessionalLink)
                                                        {{ $user->ProfessionalLink->Entity->name }}                                                    
                                                    @else
                                                        ---
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>

@endsection