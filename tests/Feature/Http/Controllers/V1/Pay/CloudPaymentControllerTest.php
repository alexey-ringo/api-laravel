<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Auth\Templates\Response\FetchUserAuthResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentDonationPayResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentPayResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentSubscriptionPayResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Controllers\V1\Pay\CloudPaymentController;
use App\Http\Middleware\PrivateMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CloudPaymentControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class CloudPaymentControllerTest extends TestCase
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
    public function test_create_cloud_payment_new_card_3ds_redirect_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_CREATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/create' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseRedirect, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.create'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'case_id' => 25,
                'sum' => 100,
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'regular' => false,
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseRedirect);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_cloud_payment_new_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_CREATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/create' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.create'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'case_id' => 25,
                'sum' => 100,
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'regular' => false,
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_cloud_payment_donation_saved_card_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_CREATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/create' => Http::response(
                CloudPaymentDonationPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.create'),
            [
                'card_id' => 123321,
                'email' => 'webmaster@nuzhnapomosh.ru',
                'case_id' => 25,
                'sum' => 100,
                'regular' => false
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentDonationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_cloud_payment_subscription_saved_card_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_CREATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/create' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.create'),
            [
                'card_id' => 123321,
                'email' => 'webmaster@nuzhnapomosh.ru',
                'case_id' => 25,
                'sum' => 100,
                'regular' => true
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_cloud_payment_saved_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_CREATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/create' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.create'),
            [
                'card_id' => 123321,
                'email' => 'webmaster@nuzhnapomosh.ru',
                'case_id' => 25,
                'sum' => 100,
                'regular' => false
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_cloud_payment_new_card_3ds_redirect_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseRedirect, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update'),
            [
                'signup_id' => 123,
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'user_id' => 25,
                'sum' => 100,
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseRedirect);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_cloud_payment_new_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update'),
            [
                'signup_id' => 123,
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'user_id' => 25,
                'sum' => 100,
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_cloud_payment_saved_card_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update'),
            [
                'signup_id' => 123,
                'card_id' => 123321,
                'email' => 'webmaster@nuzhnapomosh.ru',
                'user_id' => 25,
                'sum' => 100,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_cloud_payment_saved_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update'),
            [
                'signup_id' => 123,
                'card_id' => 123321,
                'email' => 'webmaster@nuzhnapomosh.ru',
                'user_id' => 25,
                'sum' => 100,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_commission_cloud_payment_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE_COMMISSION);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update_commission' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update.commission'),
            [
                'signup_id' => 123,
                'user_id' => 25,
                'commission' => 20,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_commission_cloud_payment_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_UPDATE_COMMISSION);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/update_commission' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.update.commission'),
            [
                'signup_id' => 123,
                'user_id' => 25,
                'commission' => 20,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deactivate_cloud_payment_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_DEACTIVATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/deactivate' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.deactivate'),
            [
                'signup_id' => 123,
                'user_id' => 25,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deactivate_cloud_payment_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_DEACTIVATE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/deactivate' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.deactivate'),
            [
                'signup_id' => 123,
                'user_id' => 25,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restore_cloud_payment_new_card_3ds_redirect_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_RESTORE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/restore' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseRedirect, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.restore'),
            [
                'signup_id' => 123,
                'cryptogram' => '1234567890',
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'email' => 'email@ya.ru',
                'sum' => 50,
                'real_sum' => 53,
                'case_id' => 2,
                'user_id' => 25,
                'startdate' => '2021-11-01 15:28',
                'site' => 'lk',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
                'phone' => '79211234567'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseRedirect);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restore_cloud_payment_new_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_RESTORE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/restore' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.restore'),
            [
                'signup_id' => 123,
                'cryptogram' => '1234567890',
                'cardNumber' => '4242 4242 4242 4242',
                'cardName' => 'IVAN IVANOV',
                'email' => 'email@ya.ru',
                'sum' => 50,
                'real_sum' => 53,
                'case_id' => 2,
                'user_id' => 25,
                'startdate' => '2021-11-01 15:28',
                'site' => 'lk',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
                'phone' => '79211234567'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restore_cloud_payment_saved_card_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_RESTORE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/restore' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.restore'),
            [
                'signup_id' => 123,
                'email' => 'email@ya.ru',
                'sum' => 50,
                'real_sum' => 53,
                'case_id' => 2,
                'user_id' => 25,
                'startdate' => '2021-11-01 15:28',
                'card_id' => 50388,
                'site' => 'lk',
                'phone' => '79211234567'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restore_cloud_payment_saved_card_fail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_RESTORE);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/cp/restore' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.restore'),
            [
                'signup_id' => 123,
                'email' => 'email@ya.ru',
                'sum' => 50,
                'real_sum' => 53,
                'case_id' => 2,
                'user_id' => 25,
                'startdate' => '2021-11-01 15:28',
                'card_id' => 50388,
                'site' => 'lk',
                'ref' => 'https://office.npmsh.local/payments/recurrent#',
                'phone' => '79211234567'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cloud_payment_token_donation_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_TOKEN);

        Http::fake([
                config('domains.pay.production.base_uri') . '/request/cp/token' => Http::response(
                    CloudPaymentDonationPayResponseTemplate::$remoteResponse, 200),
                config('domains.auth.production.base_uri') . '/api/v1/fetch' => Http::response(
                    FetchUserAuthResponseTemplate::$remoteResponse, 200),
            ]
        );

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.token'),
            [
                'token' => '123qweasd123',
                'card_id' => 123321,
                'regular' => true,
                'sum' => 53,
                'case_id' => 2
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentDonationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cloud_payment_token_subscription_success()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_CLOUD_PAYMENT_TOKEN);

        Http::fake([
                config('domains.pay.production.base_uri') . '/request/cp/token' => Http::response(
                    CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200),
                config('domains.auth.production.base_uri') . '/api/v1/fetch' => Http::response(
                    FetchUserAuthResponseTemplate::$remoteResponse, 200),
            ]
        );

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp.token'),
            [
                'token' => '123qweasd123',
                'card_id' => 123321,
                'regular' => true,
                'sum' => 53,
                'case_id' => 2
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentSubscriptionPayResponseTemplate::$outgoingResponse);
    }
}
