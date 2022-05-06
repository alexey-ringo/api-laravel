<?php

namespace Tests\Feature\Http\Controllers\V1\Shop;

use App\Domains\Shop\Templates\Response\IndexOrderShopResponseTemplate;
use App\Http\Controllers\V1\Shop\OrderController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class OrderControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Shop
 */
class OrderControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * AuthControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.auth.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrdersUserOk()
    {
        $token = $this->createEndpointToken(OrderController::ORDERS_USER);

        Http::fake([config('domains.shop.production.base_uri') . '/index.php*' => Http::response(
                IndexOrderShopResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.shop.orders.user', ['id' => 1]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexOrderShopResponseTemplate::$outgoingResponse);
    }
}
