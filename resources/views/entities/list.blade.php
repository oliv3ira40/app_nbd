@extends('Admin.layout.layout')
@section('title', 'Registrados na NBD')

@section('content')

    <div class="row heading-bg height-auto pt-0 pb-0">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 onclick="javascript:history.back()">
                <a class="text-primary font-bold" href="#">Voltar</a>
            </h5>
        </div>
        
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a style="opacity: 1;" class="text-primary font-bold" href="{{ route('adm.users.new') }}">Novo usuário</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-trans-initial txt-dark">Registrados na NBD</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Razão social</th>
                                            <th>Telefone</th>
                                            <th>DT fundação / nascimento</th>
                                            <th>CPF / CNPJ</th>
                                            {{-- <th>Ações</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Razão social</th>
                                            <th>Telefone</th>
                                            <th>DT fundação / nascimento</th>
                                            <th>CPF / CNPJ</th>
                                            {{-- <th>Ações</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['entities'] as $entity)
                                            <tr>
                                                <td>
                                                    <span style="color: {{ $entity->TypeOfEntity->tag_color }};" class="font-bold">
                                                        {{ $entity->TypeOfEntity->name }}
                                                    </span>-
                                                    {{ $entity->name }}
                                                </td>
                                                <td>
                                                    {{ $entity->telephone ?? '---' }}
                                                </td>
                                                <td>
                                                    @if ($entity->TypeOfEntity->tag != 'professional')
                                                        {{ $entity->UserHasEntity->first()->User->date_of_birth }}
                                                    @else
                                                        {{ $entity->foundation_date }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($entity->TypeOfEntity->tag != 'professional')
                                                        {{ $entity->UserHasEntity->first()->User->cpf }}
                                                    @else
                                                        {{ $entity->cnpj }}
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                </td> --}}
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