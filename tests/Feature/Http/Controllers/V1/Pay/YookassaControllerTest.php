<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Pay\Templates\Response\YookassaPayResponseTemplate;
use App\Domains\Pay\Templates\Response\YookassaSubscriptionPayResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Middleware\PrivateMiddleware;
use App\Parents\Templates\Response\StatusStringResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class YookassaControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class YookassaControllerTest extends TestCase
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
    public function testYookassaSuccess()
    {
        $token = $this->createEndpointToken(Controller::PAY_YOOKASSA_CREATE_YOOKASSA);

        Http::fake([config('domains.pay.production.base_uri') . '/request/yookassa' => Http::response(
                YookassaPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.yookassa.create'),
            [
                'action' => 'yoo_money',
                'email' => 'webmaster@nuzhnapomosh.ru'
            ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(YookassaPayResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testYookassaFail()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_YOOKASSA_CREATE_YOOKASSA);


        Http::fake([config('domains.pay.production.base_uri') . '/request/yookassa' => Http::response(
                YookassaPayResponseTemplate::$remoteResponseFail, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.yookassa.create'),
            [
                'action' => 'wrong_action',
                'email' => 'wrong@nuzhnapomosh.ru'
            ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(YookassaPayResponseTemplate::$structureResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_yookassa()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_YOOKASSA_UPDATE_YOOKASSA);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/yookassa/update' => Http::response(
                YookassaSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.yookassa.update'),
            [
                'id' => 123,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(YookassaSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deactivate_yookassa()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_YOOKASSA_DELETE_YOOKASSA);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/yookassa/deactivate' => Http::response(
                StatusStringResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.yookassa.deactivate'),
            [
                'id' => 123,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(StatusStringResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restore_yookassa()
    {
        $this->withoutMiddleware(PrivateMiddleware::class);
        $token = $this->createEndpointToken(Controller::PAY_YOOKASSA_RESTORE_YOOKASSA);

        Http::fake([config('domains.pay.production.base_uri')  . '/subscribtions/yookassa/restore' => Http::response(
                YookassaSubscriptionPayResponseTemplate::$remoteResponse, 200)]

        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.yookassa.restore'),
            [
                'id' => 123,
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(YookassaSubscriptionPayResponseTemplate::$outgoingResponse);
    }
}
