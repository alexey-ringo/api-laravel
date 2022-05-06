<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Pay\Templates\Response\CloudPaymentDonationPayResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentPayResponseTemplate;
use App\Domains\Pay\Templates\Response\CloudPaymentSubscriptionPayResponseTemplate;
use App\Domains\Pay\Templates\Response\YookassaPayResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Controllers\V1\Pay\PayController;
use App\Http\Middleware\PrivateMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class PayControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class PayControllerTest extends TestCase
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
    public function testRequestCpDonation()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken('pay-cloud_payment');

        Http::fake([config('domains.pay.production.base_uri')  . '/request/cp' => Http::response(
                CloudPaymentDonationPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'sum' => 50,
                'cardNumber' => '4242 4242 4242 4242',
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
    public function testRequestCpSubscription()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken('pay-cloud_payment');

        Http::fake([config('domains.pay.production.base_uri')  . '/request/cp' => Http::response(
                CloudPaymentSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'sum' => 50,
                'cardNumber' => '4242 4242 4242 4242',
                'regular' => false
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
    public function testRequestCpFail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken('pay-cloud_payment');

        Http::fake([config('domains.pay.production.base_uri')  . '/request/cp' => Http::response(
                CloudPaymentPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.cp'),
            [
                'cryptogram' => '1234567890',
                'email' => 'webmaster@nuzhnapomosh.ru',
                'sum' => 50,
                'cardNumber' => '4242 4242 4242 4242',
                'regular' => false
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CloudPaymentPayResponseTemplate::$outgoingResponseFail);
    }
}
