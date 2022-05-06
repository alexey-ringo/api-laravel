<?php

namespace Tests\Feature\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Templates\Response\FundraisingTakiedelaResponseTemplate;
use App\Domains\Takiedela\Templates\Response\NewsTakiedelaResponseTemplate;
use App\Domains\Takiedela\Templates\Response\TopicsTakiedelaResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class TakiedelaControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Takiedela
 */
class TakiedelaControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * OrganizationControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.takiedela.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $token = $this->createEndpointToken('takiedela-news');

        Http::fake([config('domains.takiedela.production.base_uri') . '/news*' => Http::response(
                NewsTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', 'v1/takiedela/news');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(NewsTakiedelaResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFundraisingPosts()
    {
        $token = $this->createEndpointToken('takiedela-fundraising');

        Http::fake([config('domains.takiedela.production.base_uri')  . '/posts*' => Http::response(
                FundraisingTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', 'v1/takiedela/fr');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(FundraisingTakiedelaResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTopics()
    {
        $token = $this->createEndpointToken('takiedela-topics');

        Http::fake([config('domains.takiedela.production.base_uri')  . '/topics*' => Http::response(
                TopicsTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', 'v1/takiedela/topics');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(TopicsTakiedelaResponseTemplate::$structureResponse);
    }
}
