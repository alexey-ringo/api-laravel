<?php

namespace Tests\Feature\Http\Controllers\V1\Auth;

use App\Domains\Auth\Templates\Response\ListUsersByIdsAuthResponseTemplate;
use App\Domains\Auth\Templates\Response\UserAuthResponseTemplate;
use App\Http\Controllers\V1\Auth\UserController;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class UserControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class UserControllerTest extends TestCase
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
    public function testStoreOk()
    {
        $token = $this->createEndpointToken(UserController::STORE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/store' => Http::response(
                UserAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.store'), ['email' => 'test@ya.ru', 'provider' => 'telegram', 'social_id' => '123']);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserAuthResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreSocialIdOk()
    {
        $token = $this->createEndpointToken(UserController::STORE_NEW_SOCIAL_ID);
        $id = 1;

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/update/' . $id . '/store/social' => Http::response(
                [
                    'status' => true,
                    "data" => [],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.store.social', ['id' => $id]), ['provider' => 'telegram', 'social_id' => '123']);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                'data' => [],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateAuthOk()
    {
        $token = $this->createEndpointToken(UserController::UPDATE_AUTH);
        $id = 1;

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/update/'. $id . '/auth' => Http::response(
                [
                    'status' => true,
                    "data" => [],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.update.auth', ['id' => $id]), ['email' => 'test@ya.ru', 'update_type' => 'email']);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                'data' => [],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateMetaOk()
    {
        $token = $this->createEndpointToken(UserController::UPDATE_META);
        $id = 1;

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/update/'. $id . '/meta' => Http::response(
                [
                    'status' => true,
                    "data" => [],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.update.meta', ['id' => $id]), []);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                'data' => [],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowOk()
    {
        $token = $this->createEndpointToken(UserController::SHOW);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/show' => Http::response(
                UserAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.show'), ['id' => 3, 'email' => 'test@ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserAuthResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowBySocialIdOk()
    {
        $token = $this->createEndpointToken(UserController::SHOW_BY_SOCIAL);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/show/social' => Http::response(
                UserAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.show.social'), ['provider' => 'telegram', 'social_id' => '123456789']);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserAuthResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowAuthTokenByUser()
    {
        $token = $this->createEndpointToken(UserController::SHOW_AUTH_TOKEN_BY_USER);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/show/token' => Http::response(
                [
                    'status' => true,
                    "data" => [
                        "token_type" => "Bearer",
                        "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                        "expires_in" => 0,
                        "refresh_token" => ''
                    ],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.show.token'), ['email' => 'test@ya.ru']);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                "data" => [
                    "token_type" => "Bearer",
                    "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                    "expires_in" => 0,
                    "refresh_token" => ''
                ],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteSocialIdOk()
    {
        $token = $this->createEndpointToken(UserController::DELETE_NEW_SOCIAL_ID);
        $id = 1;

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/update/' . $id . '/delete/social' => Http::response(
                [
                    'status' => true,
                    "data" => [],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.user.delete.social', ['id' => $id]), ['provider' => 'telegram']);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                'data' => [],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_users_by_ids()
    {
        $token = $this->createEndpointToken(Controller::AUTH_USER_LIST_USERS_BY_IDS);
        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/users/list-by-ids*' => Http::response(
                ListUsersByIdsAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.auth.users.list-by-ids'), ['ids' => [1,2,3]]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ListUsersByIdsAuthResponseTemplate::$outgoingResponse);
    }
}
