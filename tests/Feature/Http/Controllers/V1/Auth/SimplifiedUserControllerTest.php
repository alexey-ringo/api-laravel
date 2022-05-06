<?php

namespace Tests\Feature\Http\Controllers\V1\Auth;

use App\Domains\Auth\Templates\Response\UserAuthResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class SimplifiedUserControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class SimplifiedUserControllerTest extends TestCase
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
    public function testFetchOrReg()
    {
        $token = $this->createEndpointToken('auth-fetch_or_reg_user');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/fetch-reg' => Http::response(
                UserAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/fetch-reg', ['email' => 'test@ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserAuthResponseTemplate::$outgoingResponse);
    }
}
