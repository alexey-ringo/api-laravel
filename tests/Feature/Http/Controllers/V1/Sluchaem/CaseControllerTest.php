<?php

namespace Tests\Feature\Http\Controllers\V1\Sluchaem;

use App\Domains\Sluchaem\Templates\Response\CaseCollectionSluchaemResponseTemplate;
use App\Domains\Sluchaem\Templates\Response\CrowdfundingCollectionSluchaemResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CaseControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Sluchaem
 */
class CaseControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * CaseControllerTest constructor.
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
    public function testIndexCases()
    {
        $token = $this->createEndpointToken(Controller::SLUCHAEM_CASE_INDEX_CASES);

        Http::fake([config('domains.sluchaem.production.base_uri') . '/Search/PopupCreateEvent*' => Http::response(
                CaseCollectionSluchaemResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.sluchaem.cases'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(CaseCollectionSluchaemResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function testIndexCrowdfunding()
    {
        $token = $this->createEndpointToken(Controller::SLUCHAEM_CASE_INDEX_CROWDFUNDING);

        Http::fake([config('domains.sluchaem.production.base_uri') . '/Search/PopupCreateEvent*' => Http::response(
                CrowdfundingCollectionSluchaemResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.sluchaem.crowdfunding'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(CrowdfundingCollectionSluchaemResponseTemplate::$structureResponse);
    }
}
