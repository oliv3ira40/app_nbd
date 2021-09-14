<?php

namespace App\Http\Controllers\Peoples;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Peoples\Employee\ReqSave;
use App\Http\Requests\Peoples\Employee\ReqUpdate;

use App\Models\Admin\User;
use App\Models\Entities\Entity;
use App\Models\Entities\TypeOfEntity;
use App\Models\Entities\UserHasEntity;

class EmployeeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function list() {
        $user = \Auth::User();
        $data['entity'] = $user->UserHasEntity->Entity;
        $array_user_has_entity = $data['entity']->UserHasEntity->pluck('user_id')->toArray();
        $data['employees'] = User::whereIn('id', $array_user_has_entity)->where('group_for_entity_id', 2)->get();

        return view('peoples.employees.list', compact('data'));
    }

    public function new() {
        $user = \Auth::User();
        $data['entity'] = $user->UserHasEntity->Entity;

        return view('peoples.employees.new', compact('data'));
    }
    public function save(ReqSave $req) {
        $data = $req->all();
        $auth_user = \Auth::User();
        $data['password'] = bcrypt($data['password']);
        $data['group_id'] = $auth_user->Group->id;
        $data['group_for_entity_id'] = 2;

        $user = User::create($data);
        $user_has_entity['user_id'] = $user->id;
        $user_has_entity['entity_id'] = $auth_user->UserHasEntity->Entity->id;
        
        UserHasEntity::create($user_has_entity);
        
        session()->flash('notification', 'success:Funcionário registrado');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.employee.new');
        } else {
            return redirect()->route('adm.employee.list');
        }
    }

    public function edit($user_id) {
        $data['user'] = User::find($user_id);
        $data['entity'] = $data['user']->UserHasEntity->Entity;

        return view('peoples.employees.edit', compact('data'));
    }
    public function update(ReqUpdate $req) {
        $data = $req->all();
        $user = User::find($data['user_id']);
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        
        session()->flash('notification', 'success:Funcionário atualizado');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.employee.edit', $user->id);
        } else {
            return redirect()->route('adm.employee.list');
        }
    }

    public function alert($user_id) {
        $data['user'] = User::find($user_id);
        $data['entity'] = $data['user']->UserHasEntity->Entity;

        return view('peoples.employees.alert', compact('data'));
    }
    public function delete(Request $req) {
        $data = $req->all();
        $user = User::find($data['user_id']);

        $user->forceDelete();

        session()->flash('notification', 'success:Funcionário excluído');
        return redirect()->route('adm.employee.list');
    }
}
