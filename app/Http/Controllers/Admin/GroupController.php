<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Permission;

use App\Http\Requests\Group\newGroup;
use App\Http\Requests\Group\updateGroup;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $groups = Group::all();

        return view('Admin.groups.list', compact('groups'));
    }

    public function new()
    {
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();

        return view('Admin.groups.new', compact('created_permissions'));
    }
    public function save(newGroup $req)
    {
        $data = $req->all();

        $group = Group::create($data);
        $data['group_id'] = $group->id;

        foreach ($data['permissions'] as $key => $permission) {
            $data['created_permission_id'] = $permission;
            Permission::create($data);
        }

        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.groups.new');
        } else
        {
            return redirect()->route('adm.groups.list');
        }
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $group_permissions = $group->Permission;
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();

        $permissions = [];
    	foreach ($created_permissions as $created_permission) {
    		$created_permission['select'] = 0;

    		foreach ($group_permissions as $group_permission) {
                $group_permission = $group_permission->CreatedPermission;

    			if ($created_permission->route == $group_permission->route) {
    				$created_permission['select'] = 1;
    			}
    		}
            $permissions[] = $created_permission;
    	}

        return view('Admin.groups.edit', compact('group', 'permissions'));
    }
    public function update(updateGroup $req)
    {
        $data = $req->all();
        
        $group = Group::find($data['id']);
        $group->update($data);
        
        if (isset($data['permissions']))
        {
            Permission::where('group_id', $group->id)->delete();
            
            $data['group_id'] = $group->id;
            foreach ($data['permissions'] as $key => $permission) {
                $data['created_permission_id'] = $permission;
                Permission::create($data);
            }
        }

        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.groups.edit', $group->id);
        } else
        {
            return redirect()->route('adm.groups.list');
        }
    }

    public function alert($id)
    {
        $group = Group::find($id);

        return view('admin.groups.alert', compact('group'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        Group::find($data['id'])->delete();

        return redirect()->route('adm.groups.list');
    }
}
