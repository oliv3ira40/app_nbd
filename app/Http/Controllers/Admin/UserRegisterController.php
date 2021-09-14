<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Entities\Entity;
use App\Models\Entities\UserHasEntity;
use App\Models\Entities\TypeOfEntity;

use App\Http\Requests\UserRegister\ReqCheckPreRegister;
use App\Http\Requests\UserRegister\ReqSaveNewUser;
use App\Http\Requests\UserRegister\ReqSaveFinalizeRegistration;

class UserRegisterController extends Controller
{
    public function preRegister() {
        return view('user_register.pre_register');
    }

    public function checkPreRegister(ReqCheckPreRegister $req) {
        // $data = $req->all();

        // if ($data['user_profile'] == 'professional') {
        //     return redirect()->route('adm.register_professional');

        // } elseif($data['user_profile'] == 'office') {
        //     return redirect()->route('adm.register_office');
            
        // } elseif($data['user_profile'] == 'shopkeeper') {
        //     return redirect()->route('adm.register_shopkeeper');
            
        // } else { }
    }


    public function registerNewUser() {
        // $data['type_of_entity'] = TypeOfEntity::all();

        // return view('user_register.register_new_user', compact('data'));
    }
    public function saveNewUser(ReqSaveNewUser $req) {
        // $data = $req->all();
        // $data['user']['password'] = bcrypt($data['user']['password']);
        // $data['user']['first_name'] = $data['entity']['name'];
        // if ($data['entity']['cnpj'] == null) {
        //     $group = Group::where('tag', 'professional')->first();
        //     $data['user']['group_id'] = $group->id;
        // } else {
        //     $group = Group::where('tag', 'office')->first();
        //     $data['user']['group_id'] = $group->id;
        // }
        // $data['entity']['type_of_entity_id'] = TypeOfEntity::where('tag', $group->tag)->first()->id;
        // // dd($data);


        // $user = User::create($data['user']);
        // $entity = Entity::create($data['entity']);

        // $data['user_has_entity'] = [
        //     'user_id' => $user->id,
        //     'entity_id' => $entity->id,
        // ];
        // $user_has_entity = UserHasEntity::create($data['user_has_entity']);

        // \Auth::attempt(['email' => $user->email, 'password' => $data['user']['password_confirmation']]);
        // session()->flash('notification', 'Usuário registrado');
        // return redirect()->route('adm.finalize_registration', [
        //     'user_id' => $user->id,
        //     'entity_id' => $entity->id
        // ]);
    }

    public function skipRecord($user_id) {
        // $user = User::find($user_id);
        // $user->update(['skip_record' => ++$user->skip_record]);
        // \Session::put('skipped_record', 1);

        // return redirect()->route('adm.index');
    }

    public function finalizeRegistration() {
        // $data['user'] = \Auth::user();
        // $data['entity'] = $data['user']->UserHasEntity->Entity;
        // $data['type_of_entity'] = $data['entity']->TypeOfEntity;

        // return view('user_register.finalize_registration', compact('data'));
    }
    public function saveFinalizeRegistration(ReqSaveFinalizeRegistration $req) {
        // $data = $req->all();
        // dd($data);

        // $entity = Entity::create($data);
        // $data['entity_id'] = $entity->id;
        // UserHasEntity::create($data);

        // session()->flash('notification', 'Registro finalizado!');
        // session()->flash('notification', 'success:Registro finalizado!');
        // return redirect()->route('login');
    }
}