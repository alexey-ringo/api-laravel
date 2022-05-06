<?php

namespace Tests\Feature\Http\Controllers\V1\Core;

use App\Domains\Core\Templates\Response\IndexCaseCoreResponseTemplate;
use App\Domains\Core\Templates\Response\IndexFundCoreResponseTemplate;
use App\Domains\Core\Templates\Response\ShowCaseCoreResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CaseCoreControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Core
 */
class CaseCoreControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * CaseCoreControllerTest constructor.
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
        $token = $this->createEndpointToken(Controller::CORE_CASE_INDEX);

        Http::fake([config('domains.core.production.base_uri') . '/nko/v1/cases*' => Http::response(
                IndexCaseCoreResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.core.cases.index'),
            ['fields' => 'name1']
        );

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexCaseCoreResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show()
    {
        $token = $this->createEndpointToken(Controller::CORE_CASE_SHOW);
        $uuid = '123';

        Http::fake([config('domains.core.production.base_uri') . '/nko/v1/cases/' . $uuid => Http::response(
                ShowCaseCoreResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.core.cases.show', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(ShowCaseCoreResponseTemplate::$outgoingResponse);
    }
}
