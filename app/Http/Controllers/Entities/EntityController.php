<?php

namespace App\Http\Controllers\Entities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Entities\Entity;

class EntityController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function list() {
        $data['entities'] = Entity::select('id', 'name', 'telephone', 'foundation_date', 'cnpj', 'created_at', 'type_of_entity_id')->get();
        // dd($data['entities']->first()->UserHasEntity->first()->User);

        return view('entities.list', compact('data'));
    }
}
