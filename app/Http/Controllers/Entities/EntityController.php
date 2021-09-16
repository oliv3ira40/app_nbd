<?php

namespace App\Http\Controllers\Entities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Entities\Entity;
use App\Models\Entities\TypeOfEntity;

use App\Http\Requests\Entity\ReqAlert;

class EntityController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function list() {
        $data['entities'] = Entity::select('id', 'name', 'telephone', 'foundation_date', 'cnpj', 'created_at', 'type_of_entity_id')->get();

        return view('entities.list', compact('data'));
    }

    public function new() {
        dd('new');
    }
    public function save(Request $req) {
        dd('save');
        $data = $req->all();
    }

    public function alert($id) {
        $data['entity'] = Entity::find($id);
        $data['sales'] = $data['entity']->SpecifierSales->count();
        $data['type_entity'] = $data['entity']->TypeOfEntity;

        if ($data['type_entity']->tag == 'shopkeeper') {
            $data['sales'] = $data['entity']->Sales->count();
        }

        return view('entities.alert', compact('data'));
    }
    public function delete(ReqAlert $req) {
        $data = $req->all();
        $data['entity'] = Entity::find($data['id']);
        $data['sales'] = $data['entity']->SpecifierSales;
        $data['type_entity'] = $data['entity']->TypeOfEntity;
        
        $user_has_entity = $data['entity']->UserHasEntity;
        if ($user_has_entity->count()) {
            $user_has_entity_array = $user_has_entity->pluck('user_id')->toArray();
            $update_users['group_id'] = Group::where('tag', 'public')->first()->id;
            $users = User::whereIn('id', $user_has_entity_array);
            
            $users->update($update_users);
        }
        $data['entity']->delete();

        session()->flash('notification', 'success:Registro excluído!');
        if ($data['type_entity']->tag == 'shopkeeper') {
            return redirect()->route('adm.shopkeepers.list');
        } elseif ($data['type_entity']->tag == 'office') {
            return redirect()->route('adm.offices.list');
        } else {
            return redirect()->route('adm.professionals.list');
        }
    }
}
