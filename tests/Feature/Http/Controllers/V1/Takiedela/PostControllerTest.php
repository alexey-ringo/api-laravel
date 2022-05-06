<?php

namespace Tests\Feature\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Templates\Response\GetDonateReportsTakiedelaResponseTemplate;
use App\Domains\Takiedela\Templates\Response\PostsCountByCaseTakiedelaResponseTemplate;
use App\Domains\Takiedela\Templates\Response\SetDonateReportTakiedelaResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class PostControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Takiedela
 */
class PostControllerTest extends TestCase
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
    public function test_posts_count_by_case()
    {
        $token = $this->createEndpointToken(Controller::TAKIEDELA_POST_POSTS_COUNT_BY_CASE);

        Http::fake([config('domains.takiedela.production.base_uri') . '/posts-count*' => Http::response(
                PostsCountByCaseTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.takiedela.posts.count', ['case_id' => [2]]));

        $response
            ->assertStatus(200)
            ->assertExactJson(PostsCountByCaseTakiedelaResponseTemplate::$outgoingResponse);
    }
}
