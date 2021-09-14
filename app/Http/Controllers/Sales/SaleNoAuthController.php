<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Entities\Entity;
use App\Models\Entities\EntityAddress;
use App\Models\Entities\GroupForEntity;
use App\Models\Entities\TypeOfEntity;
use App\Models\Entities\UserHasEntity;

use App\Models\Peoples\Office;
use App\Models\Peoples\Professional;
use App\Models\Peoples\Shopkeeper;

use App\Helpers\HelpAdmin;

class SaleNoAuthController extends Controller
{
    public function getProfessionalAndOfficesAjax($filter = null) {
        // dd($filter);
        $type_of_entity = TypeOfEntity::whereIn('tag', ['professional', 'office'])
            ->pluck('id')->toArray();
        $entities = Entity::select('id', 'name', 'type_of_entity_id')
            ->where('name', 'like', '%'.$filter.'%')->get()
            // ->orWhere('company_name', 'like', '%'.$filter.'%')->get()
            ->whereIn('type_of_entity_id', $type_of_entity)
            ->toArray();

        // dd($entities);
        return $entities;
    }
}
