<?php

namespace Tests\Feature\Http\Controllers\V1\Auth;

use App\Domains\Auth\Templates\Response\LoginCodeTokenAuthResponseTemplate;
use App\Domains\Auth\Templates\Response\UserAuthResponseTemplate;
use App\Http\Controllers\V1\Auth\CodeController;
use App\Http\Controllers\V1\Controller;
use App\Parents\Templates\Response\StatusBoolResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CodeControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Auth
 */
class CodeControllerTest extends TestCase
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
    public function testSendCodeOk()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_SEND_CODE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code' => Http::response(
                [
                    'status' => true,
                    "data" => [
                        'code' => 1234
                    ],
                    'message' => 'message'
                ], 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.delay'), ['email' => 'test@ya.ru', 'channel' => 'email']);

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'status' => true,
                    "data" => [
                        'code' => 1234
                    ],
                    'message' => 'message'
                ]
            );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSendCodeNoDelay()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_SEND_CODE_NO_DELAY);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code-no-delay' => Http::response(
                [
                    'status' => true,
                    "data" => [
                        'code' => 1234
                    ],
                    'message' => 'message'
                ], 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.no-delay'), ['email' => 'test@ya.ru', 'channel' => 'email']);

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'status' => true,
                    "data" => [
                        'code' => 1234
                    ],
                    'message' => 'message'
                ]
            );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_email_code()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_SEND_EMAIL_CODE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code/email/send' => Http::response(
                StatusBoolResponseTemplate::$remoteResponse,200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.email.send'), ['email' => 'test@ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(StatusBoolResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_phone_code()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_SEND_PHONE_CODE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code/phone/send' => Http::response(
                StatusBoolResponseTemplate::$remoteResponse,200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.phone.send'), ['phone' => '79211234567']);

        $response
            ->assertStatus(200)
            ->assertExactJson(StatusBoolResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_email_code_with_cookie()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_LOGIN_WITH_EMAIL_CODE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code/email/login/cookie' => Http::response(
                LoginCodeTokenAuthResponseTemplate::$remoteResponse,200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.email.login.cookie'), ['email' => 'test@ya.ru', 'code' => '1234']);

        $response
            ->assertStatus(200)
            ->assertExactJson(LoginCodeTokenAuthResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_phone_code_with_cookie()
    {
        $token = $this->createEndpointToken(Controller::AUTH_CODE_LOGIN_WITH_PHONE_CODE);

        Http::fake([config('domains.auth.production.base_uri') . '/rest/v1/code/phone/login/cookie' => Http::response(
                LoginCodeTokenAuthResponseTemplate::$remoteResponse,200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.auth.code.phone.login.cookie'), ['phone' => '79211234567', 'code' => '1234']);

        $response
            ->assertStatus(200)
            ->assertExactJson(LoginCodeTokenAuthResponseTemplate::$outgoingResponse);
    }
}
