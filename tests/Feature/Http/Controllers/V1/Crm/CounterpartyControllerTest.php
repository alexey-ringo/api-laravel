<?php

namespace Tests\Feature\Http\Controllers\V1\Crm;

use App\Domains\Crm\Templates\Response\AttachCounterpartyCrmResponseTemplate;
use App\Domains\Crm\Templates\Response\StoreCounterpartyCrmResponseTemplate;
use App\Domains\Crm\Templates\Response\SubscriptionUpgradeCounterpartyCrmResponseTemplate;
use App\Domains\Crm\Templates\Response\UpdateSubscriptionUpgradeCounterpartyCrmResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Controllers\V1\Crm\CounterpartyController;
use App\Http\Middleware\PrivateMiddleware;
use App\Parents\Templates\Response\EmptyArrayToDataArrayResponseTemplate;
use App\Parents\Templates\Response\EmptyResponseTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CounterpartyControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Crm
 */
class CounterpartyControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * CounterpartyControllerTest constructor.
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
    public function testStore()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_STORE);

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties' => Http::response(
                StoreCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/crm/counterparties',
            [
                'model_type' => 'user',
                'model_id' => 123
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(StoreCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShow()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_SHOW);
        $uuid = 'uuid';

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/' . $uuid => Http::response(
                StoreCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.counterparties.show', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(StoreCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_SEARCH);

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/search*' => Http::response(
                StoreCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.counterparties.search'), ['email' => 'test@ya.ru', 'model_type' => 'user']);

        $response
            ->assertStatus(200)
            ->assertExactJson(StoreCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_subscription_upgrade()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_SUBSCRIPTION_UPGRADE);
        $uuid = '123';

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/signup-upgrade/' . $uuid => Http::response(
                SubscriptionUpgradeCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.counterparties.subscription-upgrade.show', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(SubscriptionUpgradeCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_subscription_upgrade()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_UPDATE_SUBSCRIPTION_UPGRADE);
        $uuid = '123';

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/signup-upgrade/' . $uuid => Http::response(
                UpdateSubscriptionUpgradeCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.crm.counterparties.subscription-upgrade.update', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(UpdateSubscriptionUpgradeCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_attach()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_ATTACH);
        $provider = 'provider';

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/attach/' . $provider => Http::response(
                AttachCounterpartyCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.crm.counterparties.attach', ['provider' => $provider]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(AttachCounterpartyCrmResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sync()
    {
        $token = $this->createEndpointToken(Controller::CRM_COUNTERPARTY_SYNC);
        $provider = 'provider';

        Http::fake([config('domains.crm.production.base_uri') . '/counterparties/sync/' . $provider => Http::response(
                EmptyResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.crm.counterparties.sync', ['provider' => $provider]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(EmptyResponseTemplate::$outgoingResponse);
    }
}
