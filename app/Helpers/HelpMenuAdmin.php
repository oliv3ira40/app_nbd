<?php

	namespace App\Helpers;
	
	use App\Helpers\HelpAdmin;

	/**
	* HelpMenuAdmin
	*/
	class HelpMenuAdmin
	{
		public static function SideMenu()
		{
			$action = \Request::route()->action['as'] ?? '';
			$auth_user = \Auth::user();

			if (HelpAdmin::IsUserDeveloper()) {
				
				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],
	
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
	
					// MENU Desenvolvedor
					[
						'permission'=>'adm.menu_developer',
						'name_menu'=>'Desenvolvedor',
					],
					// Usuários
					[
						'permission'=>'adm.menu_users',
						'label'=>'Usuários',
						'url'=>'#',
						'link_btn'=>'user_id',
						'icon'=>'fa fa-users',
	
						'a-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.users.list',
								'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo usuário',
								'url'=>'adm.users.new',
								'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Grupo
					[
						'permission'=>'adm.menu_groups',
						'label'=>'Grupo',
						'url'=>'#',
						'link_btn'=>'group_id',
						'icon'=>'fa fa-th-large',
	
						'a-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.groups.list',
							'adm.groups.new',
							'adm.groups.edit',
							'adm.groups.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.groups.list',
								'active_page'=>(in_array($action, ['adm.groups.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo grupo',
								'url'=>'adm.groups.new',
								'active_page'=>(in_array($action, ['adm.groups.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Permissões
					[
						'permission'=>'adm.menu_created_permissions',
						'label'=>'Permissões',
						'url'=>'#',
						'link_btn'=>'permi_id',
						'icon'=>'fa fa-list',
	
						'a-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.created_permissions.list',
							'adm.created_permissions.new',
							'adm.created_permissions.edit',
							'adm.created_permissions.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.created_permissions.list',
								'active_page'=>(in_array($action, ['adm.created_permissions.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novas permissões',
								'url'=>'adm.created_permissions.new',
								'active_page'=>(in_array($action, ['adm.created_permissions.new'])) ? 'active-page' : '',
							],
						],
						'line'=>true,
					],
	
					// MENU Pessoas
					[
						'permission'=>'adm.menu_people',
						'name_menu'=>'Pessoas',
					],
					// Profissionais
					[
						'permission'=>'adm.menu_developer',
						'label'=>'Profissionais',
						'url'=>'adm.professionals.list',
						'icon'=>'fa fa-user',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.professionals.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.professionals.list'])) ? 'true' : '',
					],
					// Escritórios
					[
						'permission'=>'adm.menu_developer',
						'label'=>'Escritórios',
						'url'=>'adm.offices.list',
						'icon'=>'fa fa-briefcase',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.offices.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.offices.list'])) ? 'true' : '',
					],
					// Lojistas
					[
						'permission'=>'adm.menu_developer',
						'label'=>'Lojistas',
						'url'=>'adm.shopkeepers.list',
						'icon'=>'fa fa-building-o',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.shopkeepers.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.shopkeepers.list'])) ? 'true' : '',
					],
	
					// MENU Vendas
					[
						'permission'=>'adm.menu_sales',
						'name_menu'=>'Vendas',
					],
					// Cadastrar venda
					// [
					// 	'permission'=>'adm.shopkeeper.register_sale',
					// 	'label'=>'Cadastrar venda',
					// 	'url'=>'adm.shopkeeper.register_sale',
					// 	'icon'=>'icon-plus',
					// 	'line'=>false,
	
					// 	'a-active'=>(in_array($action, ['adm.shopkeeper.register_sale'])) ? 'active' : '',
					// 	'aria-expanded'=>(in_array($action, ['adm.shopkeeper.register_sale'])) ? 'true' : '',
					// ],
					// Vendas registradas
					[
						'permission'=>'adm.sales.list',
						'label'=>'Vendas registradas',
						'url'=>'adm.sales.list',
						'icon'=>'icon-basket-loaded',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.sales.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.sales.list'])) ? 'true' : '',
					],
					// Novo relatório
					[
						'permission'=>'adm.reports.new',
						'label'=>'Novo relatório',
						'url'=>'adm.reports.new',
						'icon'=>'icon-doc',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.reports.new'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.new'])) ? 'true' : '',
					],
					//Lista de relatórios
					[
						'permission'=>'adm.reports.list',
						'label'=>'Lista de relatórios',
						'url'=>'adm.reports.list',
						'icon'=>'icon-docs',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.reports.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.list'])) ? 'true' : '',
					],
	
					// MENU Compras
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'name_menu'=>'Compras',
					// ],
					// Melhor Pontuação
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'label'=>'Melhor Pontuação',
					// 	'url'=>'adm.office.professional_list',
					// 	'icon'=>'icon-list',
					// 	'line'=>false,
	
					// 	'a-active'=>(in_array($action, ['adm.office.professional_list'])) ? 'active' : '',
					// 	'aria-expanded'=>(in_array($action, ['adm.office.professional_list'])) ? 'true' : '',
					// ],
					// Número de Vendas
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'label'=>'Número de Vendas',
					// 	'url'=>'adm.office.professional_list',
					// 	'icon'=>'icon-list',
					// 	'line'=>true,
	
					// 	'a-active'=>(in_array($action, ['adm.office.professional_list'])) ? 'active' : '',
					// 	'aria-expanded'=>(in_array($action, ['adm.office.professional_list'])) ? 'true' : '',
					// ],
				];

			} elseif (HelpAdmin::IsUserAdministrator()) {
				
				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],
	
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
	
					// Usuários
					[
						'permission'=>'adm.menu_users',
						'label'=>'Usuários',
						'url'=>'#',
						'link_btn'=>'user_id',
						'icon'=>'fa fa-users',
	
						'a-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.users.list',
							'adm.users.new',
							'adm.users.edit',
							'adm.users.alert',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.users.list',
								'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo usuário',
								'url'=>'adm.users.new',
								'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
							],
						],
						'line'=>true,
					],

					// MENU Pessoas
					[
						'permission'=>'adm.menu_people',
						'name_menu'=>'Pessoas',
					],
					// Profissionais
					[
						'permission'=>'adm.professionals.list',
						'label'=>'Profissionais',
						'url'=>'adm.professionals.list',
						'icon'=>'fa fa-user',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.professionals.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.professionals.list'])) ? 'true' : '',
					],
					// Escritórios
					[
						'permission'=>'adm.offices.list',
						'label'=>'Escritórios',
						'url'=>'adm.offices.list',
						'icon'=>'fa fa-briefcase',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.offices.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.offices.list'])) ? 'true' : '',
					],
					// Lojistas
					[
						'permission'=>'adm.shopkeepers.list',
						'label'=>'Lojistas',
						'url'=>'adm.shopkeepers.list',
						'icon'=>'fa fa-building-o',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.shopkeepers.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.shopkeepers.list'])) ? 'true' : '',
					],

					// MENU Vendas
					[
						'permission'=>'adm.menu_sales',
						'name_menu'=>'Vendas',
					],
					// Ranking
					[
						'permission'=>'adm.reports.ranking',
						'label'=>'Ranking',
						'url'=>'adm.reports.ranking',
						'icon'=>'icon-doc',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.reports.ranking'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.ranking'])) ? 'true' : '',
					],
					// Vendas registradas
					[
						'permission'=>'adm.sales.list',
						'label'=>'Vendas registradas',
						'url'=>'adm.sales.list',
						'icon'=>'icon-basket-loaded',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.sales.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.sales.list'])) ? 'true' : '',
					],
					// Novo relatório
					[
						'permission'=>'adm.reports.new',
						'label'=>'Novo relatório',
						'url'=>'adm.reports.new',
						'icon'=>'icon-doc',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.reports.new'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.new'])) ? 'true' : '',
					],
					//Lista de relatórios
					[
						'permission'=>'adm.reports.list',
						'label'=>'Lista de relatórios',
						'url'=>'adm.reports.list',
						'icon'=>'icon-docs',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.reports.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.list'])) ? 'true' : '',
					],

					// MENU Compras
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'name_menu'=>'Compras',
					// ],
					// Melhor Pontuação
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'label'=>'Melhor Pontuação',
					// 	'url'=>'adm.office.professional_list',
					// 	'icon'=>'icon-list',
					// 	'line'=>false,
	
					// 	'a-active'=>(in_array($action, ['adm.office.professional_list'])) ? 'active' : '',
					// 	'aria-expanded'=>(in_array($action, ['adm.office.professional_list'])) ? 'true' : '',
					// ],
					// Número de Vendas
					// [
					// 	'permission'=>'adm.menu_shoppings',
					// 	'label'=>'Número de Vendas',
					// 	'url'=>'adm.office.professional_list',
					// 	'icon'=>'icon-list',
					// 	'line'=>true,
	
					// 	'a-active'=>(in_array($action, ['adm.office.professional_list'])) ? 'active' : '',
					// 	'aria-expanded'=>(in_array($action, ['adm.office.professional_list'])) ? 'true' : '',
					// ],
				];

			} elseif (HelpAdmin::IsUserProfessional() AND \Auth::user()->UserHasEntity != null) {
				
				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],
	
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Perfil - Profissional
					[
						'permission'=>'adm.professional.profile',
						'label'=>'Perfil - Profissional',
						'url'=>'adm.professional.profile',
						'icon'=>'fa fa-user',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.professional.profile'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.professional.profile'])) ? 'true' : '',
					],

					// MENU Compras
					[
						'permission'=>'adm.menu_shoppings',
						'name_menu'=>'Compras',
					],
					// Compras Registradas
					[
						'permission'=>'adm.professional.shopping_list',
						'label'=>'Compras Registradas',
						'url'=>'adm.professional.shopping_list',
						'icon'=>'icon-basket-loaded',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.professional.shopping_list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.professional.shopping_list'])) ? 'true' : '',
					],
				];

			} elseif (HelpAdmin::IsUserOffice() AND \Auth::user()->UserHasEntity != null) {

				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],

					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Perfil - Profissional
					[
						'permission'=>'adm.office.profile',
						'label'=>'Perfil - Escritório',
						'url'=>'adm.office.profile',
						'icon'=>'fa fa-user',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.office.profile'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.office.profile'])) ? 'true' : '',
					],

					// Funcionários
					[
						'permission'=>'adm.employee_menu',
						'label'=>'Funcionários',
						'url'=>'#',
						'link_btn'=>'group_id',
						'icon'=>'fa fa-users',

						'a-active'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.employee.list',
								'active_page'=>(in_array($action, ['adm.employee.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo funcionário',
								'url'=>'adm.employee.new',
								'active_page'=>(in_array($action, ['adm.employee.new'])) ? 'active-page' : '',
							],
						],
						'line'=>false,
					],
					// Profissionais vinculados
					[
						'permission'=>'adm.office.link_professional',
						'label'=>'Profissionais vinculados',
						'url'=>'adm.office.link_professional',
						'icon'=>'fa fa-users',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.office.link_professional'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.office.link_professional'])) ? 'true' : '',
					],
	
					// MENU Compras
					[
						'permission'=>'adm.menu_shoppings',
						'name_menu'=>'Compras',
					],
					// Compras Registradas
					[
						'permission'=>'adm.office.shopping_list',
						'label'=>'Compras Registradas',
						'url'=>'adm.office.shopping_list',
						'icon'=>'icon-basket-loaded',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.office.shopping_list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.office.shopping_list'])) ? 'true' : '',
					],
				];

			} elseif (HelpAdmin::IsUserShopkeeper() AND \Auth::user()->UserHasEntity != null) {

				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],
					
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
					// Perfil - Profissional
					[
						'permission'=>'adm.shopkeeper.profile',
						'label'=>'Perfil - Lojista',
						'url'=>'adm.shopkeeper.profile',
						'icon'=>'fa fa-user',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.shopkeeper.profile'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.shopkeeper.profile'])) ? 'true' : '',
					],
					// Funcionários
					[
						'permission'=>'adm.employee_menu',
						'label'=>'Funcionários',
						'url'=>'#',
						'link_btn'=>'employee_id',
						'icon'=>'fa fa-users',

						'a-active'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'true' : '',
						'ul-active'=>(in_array($action, [
							'adm.employee.list',
							'adm.employee.new',
							'adm.employee.save',
							'adm.employee.edit',
							'adm.employee.update',
							'adm.employee.alert',
							'adm.employee.delete',
						])) ? 'in' : '',
						
						'sub_menu'=>[
							[
								'label'=>'Lista',
								'url'=>'adm.employee.list',
								'active_page'=>(in_array($action, ['adm.employee.list'])) ? 'active-page' : '',
							],
							[
								'label'=>'Novo funcionário',
								'url'=>'adm.employee.new',
								'active_page'=>(in_array($action, ['adm.employee.new'])) ? 'active-page' : '',
							],
						],
						'line'=>true,
					],

					// Registrados na NBD
					[
						'permission'=>'adm.entity.list',
						'label'=>'Registrados na NBD',
						'url'=>'adm.entity.list',
						'icon'=>'fa fa-users',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.entity.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.entity.list'])) ? 'true' : '',
					],
					
					// MENU Vendas
					[
						'permission'=>'adm.menu_sales',
						'name_menu'=>'Vendas',
					],
					// Vendas registradas
					[
						'permission'=>'adm.shopkeeper.list_sales',
						'label'=>'Vendas registradas',
						'url'=>'adm.shopkeeper.list_sales',
						'icon'=>'icon-basket-loaded',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.shopkeeper.list_sales'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.shopkeeper.list_sales'])) ? 'true' : '',
					],
					// Cadastrar venda
					[
						'permission'=>'adm.shopkeeper.register_sale',
						'label'=>'Cadastrar venda',
						'url'=>'adm.shopkeeper.register_sale',
						'icon'=>'icon-plus',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.shopkeeper.register_sale'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.shopkeeper.register_sale'])) ? 'true' : '',
					],

					// Novo relatório
					[
						'permission'=>'adm.reports.new',
						'label'=>'Novo relatório',
						'url'=>'adm.reports.new',
						'icon'=>'icon-doc',
						'line'=>false,
	
						'a-active'=>(in_array($action, ['adm.reports.new'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.new'])) ? 'true' : '',
					],
					//Lista de relatórios
					[
						'permission'=>'adm.reports.list',
						'label'=>'Lista de relatórios',
						'url'=>'adm.reports.list',
						'icon'=>'icon-docs',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.reports.list'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.reports.list'])) ? 'true' : '',
					],
				];

			} else {
				return [
					// Espaço
					[
						'permission'=>'#',
						'name_menu'=>'',
					],
	
					// Página inicial
					[
						'permission'=>'adm.index',
						'label'=>'Página inicial',
						'url'=>'adm.index',
						'icon'=>'fa fa-home',
						'line'=>true,
	
						'a-active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
						'aria-expanded'=>(in_array($action, ['adm.index'])) ? 'true' : '',
					],
				];
			}
		}
	}