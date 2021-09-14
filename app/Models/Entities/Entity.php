<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entities';
    protected $fillable = [
        'name',
        'company_name',
        'telephone',
        'date_of_birth',
        'foundation_date',
        'cpf',
        'cnpj',
        'type_of_entity_id',
    ];



    function Sales() {
        return $this->hasMany('App\Models\Sales\Sale', 'entity_id');
    }
    function SpecifierSales() {
        return $this->hasMany('App\Models\Sales\Sale', 'specifier_id');
    }

    function UserHasEntity() {
        return $this->hasMany('App\Models\Entities\UserHasEntity', 'entity_id');
    }
    
    function TypeOfEntity() {
        return $this->belongsTo('App\Models\Entities\TypeOfEntity', 'type_of_entity_id');
    }

    function ProfessionalLink() {
        return $this->hasMany('App\Models\Entities\ProfessionalLink', 'entity_id');
    }
}
