<?php

namespace Tests\Feature\Http\Controllers\V1\Core;

use App\Domains\Core\Templates\Response\IndexFundCoreResponseTemplate;
use App\Domains\Core\Templates\Response\ShowFundCoreResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class FundCoreControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Core
 */
class FundCoreControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * FundCoreControllerTest constructor.
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
    public function test_index()
    {
        $token = $this->createEndpointToken(Controller::CORE_FUND_INDEX);

        Http::fake([config('domains.core.production.base_uri') . '/nko/v1/fund*' => Http::response(
                IndexFundCoreResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.core.funds.index'),
            ['fields' => 'name1']
        );

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexFundCoreResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show()
    {
        $token = $this->createEndpointToken(Controller::CORE_FUND_SHOW);
        $uuid = '123';

        Http::fake([config('domains.core.production.base_uri') . '/nko/v1/fund/' . $uuid => Http::response(
                ShowFundCoreResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.core.funds.show', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(ShowFundCoreResponseTemplate::$outgoingResponse);
    }
}
