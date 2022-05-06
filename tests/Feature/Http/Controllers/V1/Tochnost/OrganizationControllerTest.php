<?php

namespace Tests\Feature\Http\Controllers\V1\Tochnost;

use App\Domains\Tochnost\Templates\Response\ClientsSearchOrganizationsTochnostResponseTemplate;
use App\Domains\Tochnost\Templates\Response\CountOrganizationsTochnostResponseTemplate;
use App\Domains\Tochnost\Templates\Response\SearchOrganizationsExtendedTochnostResponseTemplate;
use App\Domains\Tochnost\Templates\Response\SearchOrganizationsTochnostResponseTemplate;
use App\Domains\Tochnost\Templates\Response\SearchProblemsOrganizationsTochnostResponseTemplate;
use App\Domains\Tochnost\Templates\Response\ShowOrganizationTochnostResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class AuthControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class OrganizationControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * OrganizationControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.tochnost.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowOrganization()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_SHOW_ORGANIZATION);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/core/get/*' => Http::response(
                ShowOrganizationTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.organization.show', ['inn' => 7813165562]));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(ShowOrganizationTochnostResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSearchOrganizations()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/organizations/search*' => Http::response(
                SearchOrganizationsTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.organizations.search'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(SearchOrganizationsTochnostResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCountOrganization()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_COUNT_ORGANIZATIONS);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/core/counter*' => Http::response(
                CountOrganizationsTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.organizations.count'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(CountOrganizationsTochnostResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_clients_search_organizations()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_CLIENTS_SEARCH_ORGANIZATIONS);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/organizations/search*' => Http::response(
                ClientsSearchOrganizationsTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.clients.organizations.search'));

        $response
            ->assertStatus(200)
            ->assertExactJson(ClientsSearchOrganizationsTochnostResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_problems_organizations()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_SEARCH_PROBLEMS_ORGANIZATIONS);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/organizations/search*' => Http::response(
                SearchProblemsOrganizationsTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.organizations.search.problems'));

        $response
            ->assertStatus(200)
            ->assertExactJson(SearchProblemsOrganizationsTochnostResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_organizations_extended()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS_EXTENDED);

        Http::fake([config('domains.tochnost.production.base_uri') . '/organizations*' => Http::response(
                SearchOrganizationsExtendedTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.organizations.search.extended'));

        $response
            ->assertStatus(200)
            ->assertExactJson(SearchOrganizationsExtendedTochnostResponseTemplate::$outgoingResponse);
    }
}
