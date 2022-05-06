<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Pay\Templates\Response\ListPaymentsByIdsResponseTemplate;
use App\Domains\Pay\Templates\Response\ListSimplePaymentsByIdsResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class PaymentControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class PaymentControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * OrganizationControllerTest constructor.
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
    public function test_list_payments_by_id()
    {
        $token = $this->createEndpointToken(Controller::PAY_PAYMENT_LIST_PAYMENTS_BY_IDS);

        Http::fake([config('domains.pay.production.base_uri') . '/payments/getById*' => Http::response(
                ListPaymentsByIdsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.payments.list-by-ids'), ['id' => [1,2,3]]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ListPaymentsByIdsResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_simple_payments_by_id()
    {
        $token = $this->createEndpointToken(Controller::PAY_PAYMENT_LIST_PAYMENTS_BY_IDS);

        Http::fake([config('domains.pay.production.base_uri') . '/payments/getById*' => Http::response(
                ListSimplePaymentsByIdsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.payments.list-by-ids'), ['id' => [1,2,3], 'simple' => true]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ListSimplePaymentsByIdsResponseTemplate::$outgoingResponse);
    }
}
