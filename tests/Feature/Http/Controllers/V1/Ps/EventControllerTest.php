<?php

namespace Tests\Feature\Http\Controllers\V1\Ps;

use App\Domains\Ps\Templates\Response\EventsCollectionPsResponseTemplate;
use App\Domains\Ps\Templates\Response\EventsDataCountCollectionPSResponseTemplate;
use App\Http\Controllers\V1\Ps\EventController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class EventControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Ps
 */
class EventControllerTest extends TestCase
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
    public function testIndexOk()
    {
        $token = $this->createEndpointToken(EventController::EVENT_INDEX);

        Http::fake([config('domains.ps.production.base_uri') . '/events' => Http::response(
                EventsCollectionPsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.ps.events.index'), []);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(EventsCollectionPsResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowByUserIdOk()
    {
        $token = $this->createEndpointToken(EventController::EVENT_SHOW_BY_USER);
        $id = 1;

        Http::fake([config('domains.ps.production.base_uri') . '/events/getByUser/' . $id => Http::response(
            EventsDataCountCollectionPSResponseTemplate::$remoteResponse, 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.ps.events.show.user', ['id' => $id]), []);

        $responseCheck
            ->assertStatus(200)
            ->assertJsonStructure(EventsDataCountCollectionPSResponseTemplate::$structureResponse);
    }
}
