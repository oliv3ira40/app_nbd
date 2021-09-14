<?php

use App\Http\Controllers\Peoples\AdministratorController;
use App\Models\Admin\Calleds\Product;
use App\Models\Admin\Calleds\ProductSeveritie;

Route::group(['middleware' => 'VerifyUserPermissions'], function(){

    Route::get('/', 'Admin\AdminController@index')->name('adm.index');

    // CreatedPermissions
        Route::get('/permissoes-criadas/lista', 'Admin\CreatedPermissionController@list')->name('adm.created_permissions.list');
            
        Route::get('/permissoes-criadas/nova', 'Admin\CreatedPermissionController@new')->name('adm.created_permissions.new');
        Route::post('/permissoes-criadas/salvar', 'Admin\CreatedPermissionController@save')->name('adm.created_permissions.save');
        
        Route::get('/permissoes-criadas/editar/{id}', 'Admin\CreatedPermissionController@edit')->name('adm.created_permissions.edit');
        Route::post('/permissoes-criadas/atualizar', 'Admin\CreatedPermissionController@update')->name('adm.created_permissions.update');
        
        Route::get('/permissoes-criadas/alerta/{id}', 'Admin\CreatedPermissionController@alert')->name('adm.created_permissions.alert');
        Route::post('/permissoes-criadas/deletar', 'Admin\CreatedPermissionController@delete')->name('adm.created_permissions.delete');
    // CreatedPermissions

    // Groups
        Route::get('/grupos/lista', 'Admin\GroupController@list')->name('adm.groups.list');
        
        Route::get('/grupos/novo', 'Admin\GroupController@new')->name('adm.groups.new');
        Route::post('/grupos/salvar', 'Admin\GroupController@save')->name('adm.groups.save');
        
        Route::get('/grupos/editar/{id}', 'Admin\GroupController@edit')->name('adm.groups.edit');
        Route::post('/grupos/atualizar', 'Admin\GroupController@update')->name('adm.groups.update');
        
        Route::get('/grupos/alerta/{id}', 'Admin\GroupController@alert')->name('adm.groups.alert');
        Route::post('/grupos/deletar', 'Admin\GroupController@delete')->name('adm.groups.delete');
    // Groups

    // User
        Route::get('/usuarios/lista', 'Admin\UserController@list')->name('adm.users.list');
        
        Route::get('/usuarios/novo', 'Admin\UserController@new')->name('adm.users.new');
        Route::post('/usuarios/salvar', 'Admin\UserController@save')->name('adm.users.save');
        
        Route::get('/usuarios/editar/{id}', 'Admin\UserController@edit')->name('adm.users.edit');
        Route::post('/usuarios/atualizar', 'Admin\UserController@update')->name('adm.users.update');
        
        Route::get('/usuarios/alerta/{id}', 'Admin\UserController@alert')->name('adm.users.alert');
        Route::post('/usuarios/deletar', 'Admin\UserController@delete')->name('adm.users.delete');

        Route::get('/usuarios/restaurar/{id}', 'Admin\UserController@toRestore')->name('adm.users.to_restore');
    // User

    // Professionals
        Route::get('/profissionais/lista', 'Peoples\ProfessionalController@list')->name('adm.professionals.list');
        
        Route::get('/profissionais/editar/{id}', 'Peoples\ProfessionalController@edit')->name('adm.professionals.edit');
        Route::post('/profissionais/atualizar', 'Peoples\ProfessionalController@update')->name('adm.professionals.update');

        Route::get('/profissional/pagina-inicial', 'Peoples\ProfessionalController@index')->name('adm.professional.index');
        
        Route::get('/profissional/finalize-o-cadastro/{id}', 'Peoples\ProfessionalController@finalizeRegistration')->name('adm.professional.finalize_registration');
        Route::post('/profissional/save-finalize-registration', 'Peoples\ProfessionalController@saveFinalizeRegistration')->name('adm.professional.save_finalize_registration');
    
        Route::get('/profissional/lista-de-compras', 'Peoples\ProfessionalController@shoppingList')->name('adm.professional.shopping_list');
        
        Route::get('/profissional/perfil', 'Peoples\ProfessionalController@profile')->name('adm.professional.profile');
        Route::post('/profissional/update-profile', 'Peoples\ProfessionalController@updateProfile')->name('adm.professional.update_profile');

        Route::post('/profissional/alerta-remover-vinculo', 'Peoples\ProfessionalController@alertRemoveLink')->name('adm.professional.alert_remove_link');
        Route::post('/profissional/remove-link', 'Peoples\ProfessionalController@RemoveLink')->name('adm.professional.remove_link');
    // Professionals

    // Offices
        Route::get('/escritorios/lista', 'Peoples\OfficeController@list')->name('adm.offices.list');
        
        Route::get('/escritorios/editar/{id}', 'Peoples\OfficeController@edit')->name('adm.offices.edit');
        Route::post('/escritorios/update', 'Peoples\OfficeController@update')->name('adm.offices.update');
        
        Route::get('/escritorio/pagina-inicial', 'Peoples\OfficeController@index')->name('adm.office.index');
        
        Route::get('/escritorio/finalize-o-cadastro/{id}', 'Peoples\OfficeController@finalizeRegistration')->name('adm.office.finalize_registration');
        Route::post('/escritorio/save-finalize-registration', 'Peoples\OfficeController@saveFinalizeRegistration')->name('adm.office.save_finalize_registration');
        

        Route::get('/escritorio/lista-profissionais', 'Peoples\OfficeController@linkProfessional')->name('adm.office.link_professional');
        Route::get('/escritorio/vincular-profissional/{user_id}', 'Peoples\OfficeController@newLinkProfessional')->name('adm.office.new_link_professional');
        Route::post('/escritorio/save-professional-link', 'Peoples\OfficeController@saveLinkProfessional')->name('adm.office.save_link_professional');
        Route::get('/escritorio/desvincular-profissional/{user_id}', 'Peoples\OfficeController@alertLinkProfessional')->name('adm.office.alert_link_professional');
        Route::post('/escritorio/save_professional_unlinking', 'Peoples\OfficeController@deleteLinkProfessional')->name('adm.office.delete_link_professional');
        

        Route::get('/escritorio/lista-de-compras', 'Peoples\OfficeController@shoppingList')->name('adm.office.shopping_list');

        Route::get('/escritorio/perfil', 'Peoples\OfficeController@profile')->name('adm.office.profile');
        Route::post('/escritorio/update-profile', 'Peoples\OfficeController@updateProfile')->name('adm.office.update_profile');
    // Offices

    // Shopkeepers
        Route::get('/lojistas/lista', 'Peoples\ShopkeeperController@list')->name('adm.shopkeepers.list');
        
        Route::get('/lojistas/editar/{id}', 'Peoples\ShopkeeperController@edit')->name('adm.shopkeepers.edit');
        Route::post('/lojistas/atualizar', 'Peoples\ShopkeeperController@update')->name('adm.shopkeepers.update');
    
        Route::get('/lojista/pagina-inicial', 'Peoples\ShopkeeperController@index')->name('adm.shopkeeper.index');
        
        Route::get('/lojista/finalize-o-cadastro/{id}', 'Peoples\ShopkeeperController@finalizeRegistration')->name('adm.shopkeeper.finalize_registration');
        Route::post('/lojista/save-finalize-registration', 'Peoples\ShopkeeperController@saveFinalizeRegistration')->name('adm.shopkeeper.save_finalize_registration');

        Route::get('/lojista/registrar-venda/{multiple_sales?}', 'Peoples\ShopkeeperController@registerSale')
            ->name('adm.shopkeeper.register_sale');
        Route::post('/lojista/save-sales-record', 'Peoples\ShopkeeperController@saveSalesRecord')
            ->name('adm.shopkeeper.save_sales_record');
        
        Route::get('/lojista/lista-vendas', 'Peoples\ShopkeeperController@listSales')->name('adm.shopkeeper.list_sales');

        Route::get('/lojista/perfil', 'Peoples\ShopkeeperController@profile')->name('adm.shopkeeper.profile');
        Route::post('/lojista/update-profile', 'Peoples\ShopkeeperController@updateProfile')->name('adm.shopkeeper.update_profile');
        
    // Shopkeepers
    
    // Employee
        Route::get('/funcionarios', 'Peoples\EmployeeController@list')->name('adm.employee.list');
        
        Route::get('/funcionarios/novo', 'Peoples\EmployeeController@new')->name('adm.employee.new');
        Route::post('/funcionario/save', 'Peoples\EmployeeController@save')->name('adm.employee.save');
        
        Route::get('/funcionario/editar/{id}', 'Peoples\EmployeeController@edit')->name('adm.employee.edit');
        Route::post('/funcionario/update', 'Peoples\EmployeeController@update')->name('adm.employee.update');
        
        Route::get('/funcionario/alerta/{id}', 'Peoples\EmployeeController@alert')->name('adm.employee.alert');
        Route::post('/funcionario/delete', 'Peoples\EmployeeController@delete')->name('adm.employee.delete');
    // Employee

    // Administrators
        // Route::get('/admins/lista', 'Peoples\AdministratorController@list')->name('adm.administrators.list');
        
        // Route::get('/admins/editar/{id}', 'Peoples\AdministratorController@edit')->name('adm.administrators.edit');
        // Route::get('/admins/atualizar', 'Peoples\AdministratorController@update')->name('adm.administrators.update');

        // Route::get('/admins/alerta/{id}', 'Peoples\AdministratorController@alert')->name('adm.administrators.alert');
        // Route::get('/admins/excluir', 'Peoples\AdministratorController@delete')->name('adm.administrators.delete');

        Route::get('/admin/pagina-inicial', 'Peoples\AdministratorController@index')->name('adm.administrator.index');
    // Administrators

    // Sales
        Route::get('/vendas/lista', 'Sales\SaleController@list')->name('adm.sales.list');

        Route::get('/vendas/novo', 'Sales\SaleController@new')->name('adm.sales.new');
        Route::post('/vendas/salvar', 'Sales\SaleController@save')->name('adm.sales.save');
        
        Route::get('/vendas/editar/{id}', 'Sales\SaleController@edit')->name('adm.sales.edit');
        Route::post('/vendas/atualizar', 'Sales\SaleController@update')->name('adm.sales.update');

        Route::get('/vendas/alerta/{id}', 'Sales\SaleController@alert')->name('adm.sales.alert');
        Route::post('/vendas/excluir', 'Sales\SaleController@delete')->name('adm.sales.delete');

        Route::post('/vendas/validar-venda', 'Sales\SaleController@validateSale')->name('adm.sales.validate_sale');
    // Sales

    // Reports
        Route::get('/relatorios/lista', 'Sales\ReportController@list')->name('adm.reports.list');
        
        Route::get('/relatorio/novo', 'Sales\ReportController@new')->name('adm.reports.new');
        Route::post('/report/save', 'Sales\ReportController@save')->name('adm.reports.save');
        
        Route::match(['get', 'post'], '/report/ajax_get_compatible_sales', 'Sales\ReportController@AjaxGetCompatibleSales')->name('adm.reports.ajax_get_compatible_sales');
        
        Route::get('/ranking', 'Sales\ReportController@ranking')->name('adm.reports.ranking');
    // Reports

    // Entity
        Route::get('/registrados-na-nbd', 'Entities\EntityController@list')->name('adm.entity.list');
    // Entity

    Route::get('/enviar-convite-de-cadastro', 'Admin\AdminController@sendRegistrationInvitation')->name('adm.send_registration_invitation');
    Route::post('/send-invitation', 'Admin\AdminController@sendInvitation')->name('adm.send_invitation');
});	/*Fecha grupo de verificação de permissões*/
    
Route::get('/sem-permissao', 'Admin\AdminController@withoutPermission')->name('adm.withoutPermission');

Auth::routes();

// UserRegister
    Route::get('/pre-registro', 'Admin\UserRegisterController@preRegister')->name('adm.pre_register');
    Route::post('/check_pre_register', 'Admin\UserRegisterController@checkPreRegister')->name('adm.check_pre_register');

    Route::get('/registro-novo-usuario', 'Admin\UserRegisterController@registerNewUser')->name('adm.register_new_user');
    Route::post('/save-new-user', 'Admin\UserRegisterController@saveNewUser')->name('adm.save_new_user');

    Route::get('/pular-registro/{user_id}', 'Admin\UserRegisterController@skipRecord')->name('adm.skip_record');

    Route::match(['get', 'post'], '/finalizar-cadastro', 'Admin\UserRegisterController@finalizeRegistration')->name('adm.finalize_registration');
    Route::post('/save-finalize-registration', 'Admin\UserRegisterController@saveFinalizeRegistration')->name('adm.save_finalize_registration');
// UserRegister

// AUTH
    Route::get('adm/esqueci-a-senha', 'Admin\ResetPasswordController@resetPassword')->name('adm.reset_password');
    Route::post('adm/send-new-password', 'Admin\ResetPasswordController@sendNewPassword')->name('adm.send_new_password');
    
    Route::get('adm/logout', 'Admin\UserController@logout')->name('adm.logout');
// AUTH

// Sales
    Route::get('/vendas/get-professional-and-offices-ajax/{filter?}', 'Sales\SaleNoAuthController@getProfessionalAndOfficesAjax')
        ->name('adm.sales.get_professional_and_offices_ajax');
// Sales

// ProfessionalLink
    Route::get('/get-professional-link-ajax/{entity_id?}', 'Entities\ProfessionalLinkController@getProfessionalLinkAjax')->name('adm.get_professional_link_ajax');
// ProfessionalLink