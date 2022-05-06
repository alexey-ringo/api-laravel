<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Auth\Templates\Response\FetchUserAuthResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentCardPayResponseTemplate;
use App\Domains\Pay\Templates\Response\LinkedCardsPayResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Middleware\PrivateMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CardControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class CardControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * OrganizationControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.pay.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_linked_cards_by_user_token_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CARD_LINKED_CARDS_BY_USER_TOKEN);

        Http::fake([
                config('domains.pay.production.base_uri')  . '/cards/list' => Http::response(
                    LinkedCardsPayResponseTemplate::$remoteResponse, 200),
                config('domains.auth.production.base_uri') . '/api/v1/fetch' => Http::response(
                    FetchUserAuthResponseTemplate::$remoteResponse, 200),
            ]
        );

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.by-user-token'),
            [
                'token' => '123qweasd123'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(LinkedCardsPayResponseTemplate::$outgoingResponse);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_linked_cards_by_user_id_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_CARD_LINKED_CARDS_BY_ID);

        Http::fake([config('domains.pay.production.base_uri')  . '/cards/list' => Http::response(
                LinkedCardsPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.by-user-id'),
            [
                'user_id' => 1,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(LinkedCardsPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_linked_cards_by_user_id_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_CARD_LINKED_CARDS_BY_ID);

        Http::fake([config('domains.pay.production.base_uri')  . '/cards/list' => Http::response(
                LinkedCardsPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.by-user-id'),
            [
                'user_id' => 1,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(LinkedCardsPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_card_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_CARD_CREATE_CARD);

        Http::fake([config('domains.pay.production.base_uri')  . '/cards/cp/create' => Http::response(
                CloudPaymentCardPayResponseTemplate::$remoteResponseCreate, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.create'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'user_id' => 25,
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentCardPayResponseTemplate::$outgoingResponseCreate);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_card_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_CARD_DELETE_CARD);

        Http::fake([config('domains.pay.production.base_uri')  . '/cards/delete' => Http::response(
                CloudPaymentCardPayResponseTemplate::$remoteResponseOther, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.delete'),
            [
                'user_id' => 1,
                'card_id' => 3
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentCardPayResponseTemplate::$outgoingResponseOther);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_main_card_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_CARD_SET_MAIN_CARD);

        Http::fake([config('domains.pay.production.base_uri')  . '/cards/main' => Http::response(
                CloudPaymentCardPayResponseTemplate::$remoteResponseOther, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cards.main'),
            [
                'user_id' => 1,
                'card_id' => 3
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentCardPayResponseTemplate::$outgoingResponseOther);
    }
}
