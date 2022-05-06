<?php

namespace Tests\Feature\Http\Controllers\V1\Auth;

use App\Domains\Auth\Templates\Response\UserAuthResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class AuthControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class AuthControllerTest extends TestCase
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
    public function testCheckOk()
    {
        $token = $this->createEndpointToken('auth-check');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/check' => Http::response(
            [
                'status' => true,
                "data" => [],
                'message' => 'message'
            ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/check', ['email' => 'test@ya.ru', 'password' => '1234566']);

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
    public function testCheckFail()
    {
        $token = $this->createEndpointToken('auth-check');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/check' => Http::response(
                [
                    'status' => false,
                    "data" => [],
                    'message' => 'message'
                ], 400)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/check', ['email' => 'test@ya.ru', 'password' => '1234566']);

        $responseCheck
            ->assertStatus(400)
            ->assertExactJson([
                'status' => false,
                'data' => [],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $token = $this->createEndpointToken('auth-register');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/register' => Http::response(
                [
                    'status' => true,
                    "data" => [],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/register', ['email' => 'test@ya.ru', 'password' => '1234566', 'login' => false]);

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
    public function testRegisterWithLogin()
    {
        $token = $this->createEndpointToken('auth-register');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/register' => Http::response(
                [
                    'status' => true,
                    "data" => [
                        "token_type" => "Bearer",
                        "expires_in" => 2592000,
                        "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                        "refresh_token" => "def50200bade129214789d94ed7d65050afb93e9106f64716866d25387282576ada958740a0d2bef2ae79f85b5e95f93ad6ad16109334f9e"
                    ],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/register', ['email' => 'test@ya.ru', 'password' => '1234566', 'login' => true]);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                "data" => [
                    "token_type" => "Bearer",
                    "expires_in" => 2592000,
                    "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                    "refresh_token" => "def50200bade129214789d94ed7d65050afb93e9106f64716866d25387282576ada958740a0d2bef2ae79f85b5e95f93ad6ad16109334f9e"
                ],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $token = $this->createEndpointToken('auth-login');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/login' => Http::response(
                [
                    'status' => true,
                    "data" => [
                        "token_type" => "Bearer",
                        "expires_in" => 2592000,
                        "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                        "refresh_token" => "def50200bade129214789d94ed7d65050afb93e9106f64716866d25387282576ada958740a0d2bef2ae79f85b5e95f93ad6ad16109334f9e"
                    ],
                    'message' => 'message'
                ], 200)]
        );
        $responseCheck = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/login', ['email' => 'test@ya.ru', 'password' => '1234566']);

        $responseCheck
            ->assertStatus(200)
            ->assertExactJson([
                'status' => true,
                "data" => [
                    "token_type" => "Bearer",
                    "expires_in" => 2592000,
                    "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2IxYWIzZS0wYzc5LTQxN2YtYTA1MS0yMzk5NzQ1YzRmNTAiLCJqdGkiOiI2MjQy",
                    "refresh_token" => "def50200bade129214789d94ed7d65050afb93e9106f64716866d25387282576ada958740a0d2bef2ae79f85b5e95f93ad6ad16109334f9e"
                ],
                'message' => 'message'
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {
        $token = $this->createEndpointToken('auth-user');

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/user/show' => Http::response(
                UserAuthResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/auth/user', ['id' => 3, 'email' => 'test@ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserAuthResponseTemplate::$outgoingResponse);
    }
}
