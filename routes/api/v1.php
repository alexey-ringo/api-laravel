<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1 as ApiControllers;

Route::middleware('private')->prefix('api')->group(function () {
    Route::post('client/{client_uuid}/roles')->uses('Api\ClientRolesController@store')->name('store-client-roles');
    Route::delete('client/{client_uuid}/roles')->uses('Api\ClientRolesController@destroy')->name('delete-client-roles');

    Route::get('client/{client_uuid}/tokens')->uses('Api\ClientTokenController@index')->name('index-client-tokens');
    Route::post('client/{client_uuid}/token')->uses('Api\ClientTokenController@store')->name('store-client-token');
    Route::delete('token/{token_id}')->uses('Api\TokenController@destroy')->name('delete-token');

    Route::get('clients')->uses('Api\ClientController@index')->name('index-client');
    Route::post('clients')->uses('Api\ClientController@store')->name('store-client');
    Route::get('clients/{client_uuid}')->uses('Api\ClientController@show')->name('show-client');
    Route::post('clients/{client_uuid}')->uses('Api\ClientController@update')->name('update-client');
    Route::delete('clients/{client_uuid}')->uses('Api\ClientController@destroy')->name('delete-client');

    Route::post('role/{role_id}/permissions')->uses('Api\RolePermissionsController@store')->name('store-role-permissions');
    Route::delete('role/{role_id}/permissions')->uses('Api\RolePermissionsController@destroy')->name('delete-role-permissions');

    Route::get('roles')->uses('Api\RoleController@index')->name('index-role');
    Route::post('roles')->uses('Api\RoleController@store')->name('store-role');
    Route::get('roles/{roles_id}')->uses('Api\RoleController@show')->name('show-role');
    Route::post('roles/{roles_id}')->uses('Api\RoleController@update')->name('update-role');
    Route::delete('roles/{roles_id}')->uses('Api\RoleController@destroy')->name('delete-role');

    Route::get('permissions')->uses('Api\PermissionController@index')->name('index-permission');
    Route::post('permissions')->uses('Api\PermissionController@store')->name('store-permission');
    Route::get('permissions/{permissions_id}')->uses('Api\PermissionController@show')->name('show-permission');
    Route::post('permissions/{permissions_id}')->uses('Api\PermissionController@update')->name('update-permission');
    Route::delete('permissions/{permissions_id}')->uses('Api\PermissionController@destroy')->name('delete-permission');
});

Route::middleware(['auth:sanctum', 'request.logging'])->group(function () {
    Route::prefix('takiedela')->name('takiedela.')->group(function () {
        Route::get('news')->uses('Takiedela\TakiedelaController@news')->name('news');
        Route::get('fr')->uses('Takiedela\TakiedelaController@fundraisingPosts')->name('fundraising');
        Route::get('topics')->uses('Takiedela\TakiedelaController@topics')->name('takiedela.topics');
        Route::get('reports/donate')->uses('Takiedela\ReportController@getDonateReports')->name('donate.reports.get');
        Route::post('report/donate')->uses('Takiedela\ReportController@setDonateReport')->name('donate.report.set');
        Route::get('posts/count', [ApiControllers\Takiedela\PostController::class, 'postsCountByCase'])->name('posts.count');
    });
    Route::prefix('shop')->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('user/{id}')->uses('Shop\OrderController@ordersUser')->name('shop.orders.user');
            Route::get('counterparty/{uuid}')->uses('Shop\OrderController@ordersCounterparty')->name('shop.orders.counterparty');
        });
    });
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('check')->uses('Auth\AuthController@check')->name('check');
        Route::post('register')->uses('Auth\AuthController@register')->name('register');
        Route::post('recovery')->uses('Auth\AuthController@recovery')->name('recovery');
        Route::post('confirm')->uses('Auth\AuthController@confirm')->name('confirm');
        Route::post('login')->uses('Auth\AuthController@login')->name('login');
        Route::post('logout')->uses('Auth\AuthController@logout')->name('logout');
        Route::post('user')->uses('Auth\AuthController@user')->name('user');
        Route::post('fetch-user')->uses('Auth\AuthController@fetchUser')->name('user.fetch');
        Route::name('bot')->group(function () {
            Route::post('fetch-reg')->uses('Auth\SimplifiedUserController@fetchOrReg')->name('simplified.fetch-reg');
        });
        Route::prefix('user')->group(function () {
            Route::post('store')->uses('Auth\UserController@store')->name('user.store');
            Route::post('update/{id}/store/social')->uses('Auth\UserController@storeSocialId')->name('user.store.social');
            Route::post('update/{id}/meta')->uses('Auth\UserController@updateMeta')->name('user.update.meta');
            Route::post('update/{id}/auth')->uses('Auth\UserController@updateAuth')->name('user.update.auth');
            Route::post('show')->uses('Auth\UserController@show')->name('user.show');
            Route::post('show/social')->uses('Auth\UserController@showBySocialId')->name('user.show.social');
            Route::post('show/token')->uses('Auth\UserController@showAuthTokenByUser')->name('user.show.token');
            Route::post('update/{id}/delete/social')->uses('Auth\UserController@deleteSocialId')->name('user.delete.social');
        });
        Route::post('code-no-delay')->uses('Auth\CodeController@sendCodeNoDelay')->name('code.no-delay');
        Route::prefix('code')->name('code.')->group(function () {
            Route::post('')->uses('Auth\CodeController@sendCode')->name('delay');
            Route::prefix('email')->group(function () {
                Route::post('send', [ApiControllers\Auth\CodeController::class, 'sendEmailCode'])->name('email.send');
                Route::prefix('login')->group(function () {
                    Route::post('cookie', [ApiControllers\Auth\CodeController::class, 'loginWithEmailCodeSetCookie'])->name('email.login.cookie');
                });
            });
            Route::prefix('phone')->group(function () {
                Route::post('send', [ApiControllers\Auth\CodeController::class, 'sendPhoneCode'])->name('phone.send');
                Route::prefix('login')->group(function () {
                    Route::post('cookie', [ApiControllers\Auth\CodeController::class, 'loginWithPhoneCodeSetCookie'])->name('phone.login.cookie');
                });
            });
        });
        Route::prefix('setting')->group(function () {
            Route::post('update/all')->uses('Auth\SettingController@updateAllSetting')->name('setting.update.all');
            Route::post('update/user')->uses('Auth\SettingController@updateMetaData')->name('setting.update.metadata');
            Route::post('change/email')->uses('Auth\SettingController@changeEmail')->name('setting.change.email');
            Route::post('change/phone')->uses('Auth\SettingController@changePhone')->name('setting.change.phone');
            Route::post('confirm/phone')->uses('Auth\SettingController@confirmPhone')->name('setting.confirm.phone');
            Route::post('change/password')->uses('Auth\SettingController@changePassword')->name('setting.change.password');
            Route::post('check/password')->uses('Auth\SettingController@checkPassword')->name('setting.check.password');
        });
        Route::get('users/list-by-ids', [ApiControllers\Auth\UserController::class, 'listUsersByIds'])->name('users.list-by-ids');
    });
    Route::prefix('crm')->name('crm.')->group(function () {
        Route::post('filestorage')->uses('Crm\CrmController@filestorage')->name('filestorage');
        Route::post('virtual-accounts')->uses('Crm\VirtualAccountController@store')->name('virtual-accounts.store');
        Route::prefix('counterparties')->name('counterparties.')->group(function () {
            Route::post('')->uses('Crm\CounterpartyController@store')->name('store');
            Route::get('search')->uses('Crm\CounterpartyController@search')->name('search');
            Route::get('/{uuid}')->uses('Crm\CounterpartyController@show')->name('show');
            Route::get('subscription-upgrade/{uuid}', [ApiControllers\Crm\CounterpartyController::class, 'subscriptionUpgrade'])->name('subscription-upgrade.show');
            Route::post('subscription-upgrade/{uuid}', [ApiControllers\Crm\CounterpartyController::class, 'updateSubscriptionUpgrade'])->name('subscription-upgrade.update');
            Route::post('attach/{provider}', [ApiControllers\Crm\CounterpartyController::class, 'attach'])->name('attach');
            Route::post('sync/{provider}', [ApiControllers\Crm\CounterpartyController::class, 'sync'])->name('sync');
        });
        Route::get('payments/search', [ApiControllers\Crm\PaymentController::class, 'search'])->name('payments.search');
        Route::prefix('finance')->group(function () {
            Route::prefix('payments')->group(function () {
                Route::get('search', [ApiControllers\Crm\PaymentController::class, 'search'])->name('finance.payments.search');
                Route::get('stats', [ApiControllers\Crm\PaymentController::class, 'stats'])->name('finance.payments.stats');
            });
        });
        Route::prefix('reports')->group(function () {
            Route::get('annual-user-report/{uuid}', [ApiControllers\Crm\ReportController::class, 'annualUserReport'])->name('reports.annual-user-report');
        });
    });
    Route::prefix('tochnost')->name('tochnost.')->group(function () {
        Route::prefix('lists')->group(function () {
            Route::get('category')->uses('Tochnost\ListController@listCategory')->name('lists.category');
        });
        Route::prefix('organizations')->group(function () {
            Route::prefix('search')->group(function () {
                Route::get('')->uses('Tochnost\OrganizationController@searchOrganizations')->name('organizations.search');
                Route::get('extended', [ApiControllers\Tochnost\OrganizationController::class, 'searchOrganizationsExtended'])->name('organizations.search.extended');
            });
            Route::get('problems', [ApiControllers\Tochnost\OrganizationController::class, 'searchProblemsOrganizations'])->name('organizations.search.problems');
            Route::get('verify-funds')->uses('Tochnost\OrganizationController@verifyFunds')->name('verify-funds');
            Route::get('show/{inn}')->uses('Tochnost\OrganizationController@showOrganization')->name('organization.show');
            Route::get('count')->uses('Tochnost\OrganizationController@countOrganizations')->name('organizations.count');
        });
        Route::prefix('clients')->group(function () {
            Route::prefix('organizations')->group(function () {
                Route::get('search')->uses('Tochnost\OrganizationController@clientsSearchOrganizations')->name('clients.organizations.search');
            });
        });
    });
    Route::prefix('pay')->group(function () {
        Route::prefix('cards')->group(function () {
            Route::post('by-user-token')->uses('Pay\CardController@getCardsByUserToken')->name('pay.cards.by-user-token');
            Route::post('by-user-id')->uses('Pay\CardController@getCardsByUserId')->name('pay.cards.by-user-id');
            Route::post('create')->uses('Pay\CardController@create')->name('pay.cards.create');
            Route::post('delete')->uses('Pay\CardController@delete')->name('pay.cards.delete');
            Route::post('main')->uses('Pay\CardController@setMain')->name('pay.cards.main');
        });
        Route::post('cp-token')->uses('Pay\CloudPaymentController@cloudPaymentToken')->name('pay.cp.token.deprecated');
        Route::prefix('yookassa')->group(function () {
            Route::post('create', [ApiControllers\Pay\YookassaController::class, 'create'])->name('pay.yookassa.create');
            Route::post('update', [ApiControllers\Pay\YookassaController::class, 'update'])->name('pay.yookassa.update');
            Route::post('deactivate', [ApiControllers\Pay\YookassaController::class, 'deactivate'])->name('pay.yookassa.deactivate');
            Route::post('restore', [ApiControllers\Pay\YookassaController::class, 'restore'])->name('pay.yookassa.restore');
        });
        Route::prefix('cp')->group(function () {
            Route::post('create')->uses('Pay\CloudPaymentController@createCloudPayment')->name('pay.cp.create');
            Route::post('update')->uses('Pay\CloudPaymentController@updateCloudPayment')->name('pay.cp.update');
            Route::post('deactivate')->uses('Pay\CloudPaymentController@deactivateCloudPayment')->name('pay.cp.deactivate');
            Route::post('update_commission')->uses('Pay\CloudPaymentController@updateCommissionCloudPayment')->name('pay.cp.update.commission');
            Route::post('restore')->uses('Pay\CloudPaymentController@restoreCloudPayment')->name('pay.cp.restore');
            Route::post('token')->uses('Pay\CloudPaymentController@cloudPaymentToken')->name('pay.cp.token');
        });
        Route::post('cp')->uses('Pay\PayController@cloudPayment')->name('pay.cp');
        Route::prefix('office')->group(function () {
            Route::prefix('payments')->group(function () {
                Route::get('', [ApiControllers\Pay\OfficeController::class, 'indexPayments'])->name('pay.office.payments.index');
                Route::post('invoice', [ApiControllers\Pay\OfficeController::class, 'invoice'])->name('pay.office.payments.invoice');
            });
            // TODO: signups - Deprecated!!!
            Route::get('signups')->uses('Pay\OfficeController@indexSubscriptions')->name('pay.office.subscriptions.index.deprecated');
            Route::get('subscriptions', [ApiControllers\Pay\OfficeController::class, 'indexSubscriptions'])->name('pay.office.subscriptions.index');
            Route::prefix('metrics')->group(function () {
                Route::get('user', [ApiControllers\Pay\OfficeController::class, 'showUserMetrics'])->name('pay.office.metrics.user');
            });
            Route::prefix('matching')->group(function () {
                Route::get('organization', [ApiControllers\Pay\OfficeController::class, 'showMatchingOrganization'])->name('pay.office.matching.organization.show');
                Route::post('organization', [ApiControllers\Pay\OfficeController::class, 'setMatchingOrganization'])->name('pay.office.matching.organization.set');
                Route::prefix('campaigns')->group(function () {
                    Route::get('', [ApiControllers\Pay\OfficeController::class, 'indexMatchingCampaigns'])->name('pay.office.matching.campaigns.index');
                    Route::post('', [ApiControllers\Pay\OfficeController::class, 'setMatchingCampaign'])->name('pay.office.matching.campaigns.set');
                });
                Route::post('campaign/balance', [ApiControllers\Pay\OfficeController::class, 'balanceMatchingCampaign'])->name('pay.office.matching.campaign.balance');
            });
            Route::prefix('gift')->group(function () {
                Route::post('activate', [ApiControllers\Pay\OfficeController::class, 'activateGiftCard'])->name('pay.office.gift.activate');
                Route::post('history', [ApiControllers\Pay\OfficeController::class, 'historyGiftCards'])->name('pay.office.gift.history');
            });
        });
        Route::get('payments/list-by-ids', [ApiControllers\Pay\PaymentController::class, 'listPaymentsByIds'])->name('pay.payments.list-by-ids');
    });
    Route::prefix('sluchaem')->group(function () {
        Route::get('funds')->uses('Sluchaem\FundController@indexFunds')->name('sluchaem.funds');
        Route::get('cases')->uses('Sluchaem\CaseController@indexCases')->name('sluchaem.cases');
        Route::get('crowdfunding')->uses('Sluchaem\CaseController@indexCrowdfunding')->name('sluchaem.crowdfunding');
        Route::get('all-funds')->uses('Sluchaem\FundController@indexAllFunds')->name('sluchaem.funds.all');
    });
    Route::prefix('ps')->group(function () {
        Route::prefix('events')->group(function () {
            Route::get('')->uses('Ps\EventController@index')->name('ps.events.index');
            Route::get('show/user/{id}')->uses('Ps\EventController@showByUserId')->name('ps.events.show.user');
        });
    });
    Route::prefix('edu')->group(function () {
        Route::get('user/courses')->uses('Edu\CourseController@listUserCourses')->name('edu.courses.user.list');
        Route::get('users/teachers', [ApiControllers\Edu\UsersController::class, 'indexUsersTeachers'])->name('edu.users.teachers.index');
        Route::get('courses/search-by-url', [ApiControllers\Edu\CourseController::class, 'searchCourseByUrl'])->name('edu.courses.search-by-url');
    });
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('', [ApiControllers\Comments\CommentController::class, 'index'])->name('index');
        Route::get('get-by-donation-id', [ApiControllers\Comments\CommentController::class, 'getByDonationId'])->name('get-by-donation-id');
        Route::post('create', [ApiControllers\Comments\CommentController::class, 'create'])->name('create');
        Route::post('thread', [ApiControllers\Comments\CommentController::class, 'thread'])->name('thread');
        Route::post('update/{id}', [ApiControllers\Comments\CommentController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ApiControllers\Comments\CommentController::class, 'delete'])->name('delete');
    });
    Route::prefix('core')->name('core.')->group(function () {
        Route::get('funds', [ApiControllers\Core\FundCoreController::class, 'index'])->name('funds.index');
        Route::get('funds/{uuid}', [ApiControllers\Core\FundCoreController::class, 'show'])->name('funds.show');
        Route::get('cases', [ApiControllers\Core\CaseCoreController::class, 'index'])->name('cases.index');
        Route::get('cases/{uuid}', [ApiControllers\Core\CaseCoreController::class, 'show'])->name('cases.show');
    });
});

if (app()->environment('local')) {
    Route::get('test', 'TestController');
}
