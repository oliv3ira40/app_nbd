<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\ReqSave;
use App\Http\Requests\User\updateUser;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Entities\Entity;
use App\Models\Entities\UserHasEntity;
use App\Models\Entities\TypeOfEntity;

use Illuminate\Auth\Notifications\ResetPassword;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function list() {
        $developer_group = Group::where('tag', 'developer')->first();
        $users = User::select('id', 'first_name', 'last_name', 'email', 'created_at', 'deleted_at', 'group_id')
            ->orderBy('created_at', 'desc')->withTrashed()->get();

        return view('Admin.users.list', compact('users'));
    }

    public function new() {
        $groups_entities = TypeOfEntity::pluck('tag')->toArray();
        $groups = Group::whereIn('tag', $groups_entities)->get();
        $developer_group = Group::where('tag', 'developer')->first();
        
        if (!HelpAdmin::IsUserDeveloper()) {
            $groups = $groups->where('id', '!=', $developer_group->id);
        }

        return view('Admin.users.new', compact('groups'));
    }
    public function save(ReqSave $req) {
        $data = $req->all();
        $group = Group::find($data['user']['group_id']);
        $data['user']['first_name'] = $data['entity']['name'];
        $data['user']['password'] = bcrypt($data['user']['password']);
        $data['user']['group_for_entity_id'] = 1;
        $data['entity']['type_of_entity_id'] = TypeOfEntity::where('tag', $group->tag)->first()->id;

        $user = User::create($data['user']);
        $entity = Entity::create($data['entity']);

        $data['user_has_entity'] = [
            'user_id' => $user->id,
            'entity_id' => $entity->id,
        ];
        $user_has_entity = UserHasEntity::create($data['user_has_entity']);

        session()->flash('notification', 'success:Usuário registrado');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.users.new');
        } else {
            return redirect()->route('adm.users.list');
        }
    }

    public function edit($id) {
        $developer_group = Group::where('tag', 'developer')->first();
        $auth_user = \Auth::User();
        
        $user = User::find($id);
        if ($user == null) {
            session()->flash('notification', 'error:Este usuário não está mais disponível');
            return redirect()->route('adm.index');
        }

        if (HelpAdmin::IsUserDeveloper($user) AND
            !HelpAdmin::IsUserDeveloper()) {
            return redirect()->route('adm.withoutPermission');
        }

        if ($auth_user->id != $user->id
        AND !in_array('adm.users.edit_other_users', HelpAdmin::permissionsUser($auth_user))) {
            return redirect()->route('adm.withoutPermission');
        }

        $groups_entities = TypeOfEntity::pluck('tag')->toArray();
        $groups = Group::whereIn('tag', $groups_entities)->get();
        if (!HelpAdmin::IsUserDeveloper()) {
            $groups = $groups->where('id', '!=', $developer_group->id);
        }

        return view('Admin.users.edit', compact('user', 'groups'));
    }
    public function update(updateUser $req) {
        $data = $req->all();
        $user = User::find($data['id']);
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);
        
        session()->flash('notification', 'success:Usuário atualizado');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.users.edit', $user->id);
        } else {
            if (in_array('adm.users.list', HelpAdmin::permissionsUser()))
            {
                return redirect()->route('adm.users.list');
            } else
            {
                return redirect()->route('adm.users.edit', $user->id);
            }
        }
    }

    public function alert($id) {
        $user = User::find($id);

        return view('Admin.users.alert', compact('user'));
    }
    public function delete(Request $req) {
        $data = $req->all();
        User::find($data['id'])->delete();

        session()->flash('notification', 'success:Usuário excluído');
        return redirect()->route('adm.users.list');
    }

    public function toRestore($id) {
        $user = User::where('id', $id)->withTrashed()->first();
        $user->restore();

        session()->flash('notification', 'success:Usuário restaurado');
        return redirect()->route('adm.users.list');
    }

    public function logout(Request $req) {
        \Auth::logout();
        
        $req->session()->forget('skipped_record');
        return redirect()->route('login');
    }
}
