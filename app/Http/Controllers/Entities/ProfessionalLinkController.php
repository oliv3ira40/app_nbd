<?php

namespace App\Http\Controllers\Entities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Entities\Entity;

class ProfessionalLinkController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function getProfessionalLinkAjax($entity_id) {
        $entity = Entity::find($entity_id);
        $type_of_entity = $entity->TypeOfEntity;
        
        if ($type_of_entity->tag == 'professional') {
            $user = $entity->UserHasEntity->first()->User;
            $professional_link = $user->ProfessionalLink;

            if ($professional_link != null) {
                $entities['office'] = $professional_link->Entity->toArray();
                $entities['professional'] = $entity->toArray();
                
                return $entities;
            } else {
                return 'is_autonomous';
            }
        } else {
            return 'is_office';
        }
    }
}
