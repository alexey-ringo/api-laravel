<?php

namespace Tests\Feature\Http\Controllers\V1\Sluchaem;

use App\Domains\Sluchaem\Templates\Response\FundCollectionSluchaemResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class FundControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Sluchaem
 */
class FundControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * FundControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.sluchaem.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexFunds()
    {
        $token = $this->createEndpointToken('sluchaem-index_funds');

        Http::fake([config('domains.sluchaem.production.base_uri') . '/Search/PopupCreateEvent*' => Http::response(
                FundCollectionSluchaemResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', 'v1/sluchaem/funds');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(FundCollectionSluchaemResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexAllFunds()
    {
        $token = $this->createEndpointToken('sluchaem-index_all_funds');

        Http::fake([config('domains.sluchaem.production.base_uri')  . '/Search/Count*' => Http::response(
                ['count' => 20], 200)]
        );

        Http::fake([config('domains.sluchaem.production.base_uri')  . '/Search/PopupCreateEvent*' => Http::response(
                FundCollectionSluchaemResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', 'v1/sluchaem/all-funds');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(FundCollectionSluchaemResponseTemplate::$structureResponse);
    }
}
