<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::post('users_restore/{id}', ['uses' => 'Admin\UsersController@restore', 'as' => 'users.restore']);
    Route::delete('users_perma_del/{id}', ['uses' => 'Admin\UsersController@perma_del', 'as' => 'users.perma_del']);
    Route::resource('groups', 'Admin\GroupsController');
    Route::post('groups_mass_destroy', ['uses' => 'Admin\GroupsController@massDestroy', 'as' => 'groups.mass_destroy']);
    Route::post('groups_restore/{id}', ['uses' => 'Admin\GroupsController@restore', 'as' => 'groups.restore']);
    Route::delete('groups_perma_del/{id}', ['uses' => 'Admin\GroupsController@perma_del', 'as' => 'groups.perma_del']);
    Route::resource('user_actions', 'Admin\UserActionsController');
  //  Route::get('contracts/{id}/{filename}', ['uses' => 'Admin\ContractsController@downloadfile', 'as' => 'contracts.downloadfile']);
  Route::get('contracts/{id}/downloadfile/{filename}', ['uses' => 'Admin\ContractsController@downloadfile', 'as' => 'contracts.downloadfile']);
    Route::resource('contracts', 'Admin\ContractsController');
    //Route::get('contracts/{filename}','Admin\ContractsController@downloadfile');
    Route::post('contracts_mass_destroy', ['uses' => 'Admin\ContractsController@massDestroy', 'as' => 'contracts.mass_destroy']);
    Route::post('contracts_restore/{id}', ['uses' => 'Admin\ContractsController@restore', 'as' => 'contracts.restore']);
    Route::delete('contracts_perma_del/{id}', ['uses' => 'Admin\ContractsController@perma_del', 'as' => 'contracts.perma_del']);
    Route::resource('companies', 'Admin\PartnerCompaniesController');
    //Route::post('companies_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('suppliers', 'Admin\SuppliersController');
    Route::post('suppliers_mass_destroy', ['uses' => 'Admin\SuppliersController@massDestroy', 'as' => 'suppliers.mass_destroy']);
    Route::post('suppliers_restore/{id}', ['uses' => 'Admin\SuppliersController@restore', 'as' => 'suppliers.restore']);
    Route::delete('suppliers_perma_del/{id}', ['uses' => 'Admin\SuppliersController@perma_del', 'as' => 'suppliers.perma_del']);
    //
    Route::resource('contactpersons', 'Admin\ContactPersonController');
    Route::post('contactpersons_mass_destroy', ['uses' => 'Admin\ContactPersonController@massDestroy', 'as' => 'contactpersons.mass_destroy']);
    Route::post('contactpersons_restore/{id}', ['uses' => 'Admin\ContactPersonController@restore', 'as' => 'contactpersons.restore']);
    Route::delete('contactpersons_perma_del/{id}', ['uses' => 'Admin\ContactPersonController@perma_del', 'as' => 'contactpersons.perma_del']);


});
