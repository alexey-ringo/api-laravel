<?php

namespace Tests\Feature\Http\Controllers\V1\Crm;

use App\Domains\Crm\Templates\Response\SearchPaymentCrmResponseTemolate;
use App\Domains\Crm\Templates\Response\StatsPaymentCrmResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class PaymentControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Crm
 */
class PaymentControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * PaymentControllerTest constructor.
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
    public function test_search()
    {
        $token = $this->createEndpointToken(Controller::CRM_PAYMENT_SEARCH);

        Http::fake([config('domains.crm.production.base_uri') . '/finance/payments/search*' => Http::response(
                SearchPaymentCrmResponseTemolate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.payments.search'));

        $response
            ->assertStatus(200)
            ->assertExactJson(SearchPaymentCrmResponseTemolate::$remoteResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_stats()
    {
        $token = $this->createEndpointToken(Controller::CRM_PAYMENT_STATS);

        Http::fake([config('domains.crm.production.base_uri') . '/finance/payments/stats*' => Http::response(
                StatsPaymentCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.finance.payments.stats', [
            'cases' => [2]
        ]));

        $response
            ->assertStatus(200)
            ->assertExactJson(StatsPaymentCrmResponseTemplate::$remoteResponse);
    }
}
