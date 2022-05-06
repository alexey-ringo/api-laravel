<?php

namespace Tests\Feature\Http\Controllers\V1\Tochnost;

use App\Domains\Tochnost\Templates\Response\ListCategoryTochnostResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class ListControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class ListControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * ListControllerTest constructor.
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
    public function testListCategory()
    {
        $token = $this->createEndpointToken(Controller::TOCHNOST_LIST_LIST_CATEGORY);

        Http::fake([config('domains.tochnost.production.base_uri') . '/service/lists/category*' => Http::response(
                ListCategoryTochnostResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.tochnost.lists.category'));

        $response
            ->assertStatus(200)
            ->assertJsonStructure(ListCategoryTochnostResponseTemplate::$structureResponse);
    }
}
