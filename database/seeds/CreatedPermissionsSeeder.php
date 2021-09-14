<?php

use Illuminate\Database\Seeder;

use App\Models\Admin\CreatedPermission;

class CreatedPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            [
                'name'=>'lista - Permissões criadas',
                'route'=>'adm.created_permissions.list',
            ],
            [
                'name'=>'Nova - Permissões criadas',
                'route'=>'adm.created_permissions.new',
            ],
            [
                'name'=>'Salvar - Permissões criadas',
                'route'=>'adm.created_permissions.save',
            ],
            [
                'name'=>'Editar - Permissões criadas',
                'route'=>'adm.created_permissions.edit',
            ],
            [
                'name'=>'Atualizar - Permissões criadas',
                'route'=>'adm.created_permissions.update',
            ],
            [
                'name'=>'Excluir - Permissões criadas',
                'route'=>'adm.created_permissions.delete',
            ],
            [
                'name'=>'Lista - Grupos',
                'route'=>'adm.groups.list',
            ],
            [
                'name'=>'Novo - Grupos',
                'route'=>'adm.groups.new',
            ],
            [
                'name'=>'Salvar - Grupos',
                'route'=>'adm.groups.save',
            ],
            [
                'name'=>'Editar - Grupos',
                'route'=>'adm.groups.edit',
            ],
            [
                'name'=>'Atualizar - Grupos',
                'route'=>'adm.groups.update',
            ],
            [
                'name'=>'Excluir - Grupos',
                'route'=>'adm.groups.delete',
            ],
            [
                'name'=>'Lista - Usuários',
                'route'=>'adm.users.list',
            ],
            [
                'name'=>'Novo - Usuários',
                'route'=>'adm.users.new',
            ],
            [
                'name'=>'Salvar - Usuários',
                'route'=>'adm.users.save',
            ],
            [
                'name'=>'Editar - Usuários',
                'route'=>'adm.users.edit',
            ],
            [
                'name'=>'Atualizar - Usuários',
                'route'=>'adm.users.update',
            ],
            [
                'name'=>'Excluir - Usuários',
                'route'=>'adm.users.delete',
            ],
            [
                'name'=>'Editar grupo - Usuários',
                'route'=>'adm.users.edit_group',
            ],
            [
                'name'=>'Editar outros usuários - Usuários',
                'route'=>'adm.users.edit_other_users',
            ],
            [
                'name'=>'Alerta de exclusão - Permissões criadas',
                'route'=>'adm.created_permissions.alert',
            ],
            [
                'name'=>'Alerta de exclusão - Grupos',
                'route'=>'adm.groups.alert',
            ],
            [
                'name'=>'Alerta de exclusão - Usuários',
                'route'=>'adm.users.alert',
            ],
            [
                'name'=>'Página inicial - Admin',
                'route'=>'adm.index',
            ],
            [
                'name'=>'Menu desenvolvedor',
                'route'=>'adm.menu_developer',
            ],
            [
                'name'=>'Usuário desenvolvedor',
                'route'=>'developer',
            ],
            [
                'name'=>'Menu - Usuários',
                'route'=>'adm.menu_users',
            ],
            [
                'name'=>'Menu - Grupos',
                'route'=>'adm.menu_groups',
            ],
            [
                'name'=>'Menu - Permissões criadas',
                'route'=>'adm.menu_created_permissions',
            ],
        ];

        if (CreatedPermission::all()->count() == 0) {
            
            $n = 0;
            foreach ($arrays as $key => $array) {
                CreatedPermission::create($array);
                echo ++$n . " - Permissão cadastrada!";
            }

        }
    }
}