<?php

namespace Tests\Feature\Http\Controllers\V1\Crm;

use App\Domains\Crm\Templates\Response\StoreVirtualAccountCrmResponseTemplate;
use App\Http\Controllers\V1\Crm\VirtualAccountController;
use App\Http\Middleware\PrivateMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class VirtualAccountControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Crm
 */
class VirtualAccountControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * VirtualAccountControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.pay.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $token = $this->createEndpointToken(VirtualAccountController::VIRTUAL_ACCOUNT_STORE);

        Http::fake([config('domains.crm.production.base_uri') . '/virtual-accounts' => Http::response(
                StoreVirtualAccountCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/crm/virtual-accounts',
            [
                'case_id' => 123
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(StoreVirtualAccountCrmResponseTemplate::$remoteResponse);
    }
}
