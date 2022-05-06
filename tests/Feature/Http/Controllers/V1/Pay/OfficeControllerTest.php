<?php

namespace Tests\Feature\Http\Controllers\V1\Pay;

use App\Domains\Pay\Actions\OfficeUserMetricsPayAction;
use App\Domains\Pay\Templates\Response\ActivateGiftCardPayResponseTemplate;
use App\Domains\Pay\Templates\Response\BalanceMatchingCampaignPayResponseTemplate;
use App\Domains\Pay\Templates\Response\CreateMatchingCampaignPayResponseTemplate;
use App\Domains\Pay\Templates\Response\HistoryGiftCardsPayResponseTemplate;
use App\Domains\Pay\Templates\Response\IndexMatchingCampaignPayResponseTemplate;
use App\Domains\Pay\Templates\Response\IndexPaymentPayResponseTemplate;
use App\Domains\Pay\Templates\Response\IndexSubscriptionPayResponseTemplate;
use App\Domains\Pay\Templates\Response\InvoicePayResponseTemplate;
use App\Domains\Pay\Templates\Response\SetMatchingOrganizationPayResponseTemplate;
use App\Domains\Pay\Templates\Response\ShowMatchingOrganizationPayResponseTemplate;
use App\Domains\Pay\Templates\Response\UserMetricsDonationPayResponseTemplate;
use App\Domains\Pay\Templates\Response\UserMetricsEventPayResponseTemplate;
use App\Domains\Pay\Templates\Response\UserMetricsMatchingPayResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class OfficeControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Pay
 */
class OfficeControllerTest extends TestCase
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
    public function test_index_payments_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INDEX_PAYMENTS);

        Http::fake([config('domains.pay.production.base_uri') . '/payments/get*' => Http::response(
                IndexPaymentPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.payments.index'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexPaymentPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_payments_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INDEX_PAYMENTS);

        Http::fake([config('domains.pay.production.base_uri') . '/payments/get*' => Http::response(
                IndexPaymentPayResponseTemplate::$remoteResponseFail, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.payments.index'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexPaymentPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_subscriptions_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INDEX_SIGNUPS);

        Http::fake([config('domains.pay.production.base_uri') . '/subscribtions/get*' => Http::response(
                IndexSubscriptionPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.subscriptions.index'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexSubscriptionPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_subscriptions_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INDEX_SIGNUPS);

        Http::fake([config('domains.pay.production.base_uri') . '/subscribtions/get*' => Http::response(
                IndexSubscriptionPayResponseTemplate::$remoteResponseFail, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.subscriptions.index'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexSubscriptionPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user_metrics_once_true()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_USER_METRICS);

        Http::fake([config('domains.pay.production.base_uri') . '/metrics/user*' => Http::response(
                UserMetricsDonationPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.metrics.user'), ['user_id' => 123, 'type' => OfficeUserMetricsPayAction::ONCE_TRUE]);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserMetricsDonationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user_metrics_once_false()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_USER_METRICS);

        Http::fake([config('domains.pay.production.base_uri') . '/metrics/user*' => Http::response(
                UserMetricsDonationPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.metrics.user'), ['user_id' => 123, 'type' => OfficeUserMetricsPayAction::ONCE_FALSE]);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserMetricsDonationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user_metrics_recurrent()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_USER_METRICS);

        Http::fake([config('domains.pay.production.base_uri') . '/metrics/user*' => Http::response(
                UserMetricsDonationPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.metrics.user'), ['user_id' => 123, 'type' => OfficeUserMetricsPayAction::RECURRENT]);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserMetricsDonationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user_metrics_events()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_USER_METRICS);

        Http::fake([config('domains.pay.production.base_uri') . '/metrics/user*' => Http::response(
                UserMetricsEventPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.metrics.user'), ['user_id' => 123, 'type' => OfficeUserMetricsPayAction::EVENTS]);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserMetricsEventPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user_metrics_matching()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_USER_METRICS);

        Http::fake([config('domains.pay.production.base_uri') . '/metrics/user*' => Http::response(
                UserMetricsMatchingPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.metrics.user'), ['user_id' => 123, 'type' => OfficeUserMetricsPayAction::MATCHING]);

        $response
            ->assertStatus(200)
            ->assertExactJson(UserMetricsMatchingPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_matching_organizations_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_MATCHING_ORGANIZATION);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/getorg*' => Http::response(
                ShowMatchingOrganizationPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.matching.organization.show'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ShowMatchingOrganizationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_matching_organizations_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SHOW_MATCHING_ORGANIZATION);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/getorg*' => Http::response(
                ShowMatchingOrganizationPayResponseTemplate::$remoteResponseFail, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.matching.organization.show'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ShowMatchingOrganizationPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_matching_organization()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_SET_MATCHING_ORGANIZATION);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/setorg' => Http::response(
                SetMatchingOrganizationPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.matching.organization.set'), [
            'user_id' => 123,
            'name' => 'Org',
            'inn' => 'inn',
            'person' => 'bik',
            'email' => 'email',
            'phone' => 'phone',
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(SetMatchingOrganizationPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_matching_campaigns()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INDEX_MATCHING_CAMPAIGNS);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/getcampaigns*' => Http::response(
                IndexMatchingCampaignPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.pay.office.matching.campaigns.index'), ['user_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexMatchingCampaignPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_matching_campaign()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_CREATE_MATCHING_CAMPAIGN);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/campaign/set' => Http::response(
                CreateMatchingCampaignPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.matching.campaigns.set'), [
            'user_id' => 123,
            'name' => 'Test Campaign',
            'max_sum' => 500,
            'recurrent' => '1',
            'type' => '0',
            'cases' => [1,2,3],
            'activate' => true,
            'start_campaign' => '07.11.2021'
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CreateMatchingCampaignPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_matching_campaign_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_CREATE_MATCHING_CAMPAIGN);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/campaign/set' => Http::response(
                CreateMatchingCampaignPayResponseTemplate::$remoteResponseFail, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.matching.campaigns.set'), [
            'user_id' => 123,
            'name' => 'Test Campaign',
            'max_sum' => 500,
            'recurrent' => '1',
            'type' => '0',
            'cases' => [1,2,3],
            'activate' => true,
            'start_campaign' => '07.11.2021'
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(CreateMatchingCampaignPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_activate_gift_card_ok()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_ACTIVATE_GIFT_CARD);

        Http::fake([config('domains.pay.production.base_uri') . '/gift/activate' => Http::response(
                ActivateGiftCardPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.gift.activate'), [
            'user_id' => 123,
            'code' => '123ASD',
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ActivateGiftCardPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_activate_gift_card_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_ACTIVATE_GIFT_CARD);

        Http::fake([config('domains.pay.production.base_uri') . '/gift/activate' => Http::response(
                ActivateGiftCardPayResponseTemplate::$remoteResponseFail, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.gift.activate'), [
            'user_id' => 123,
            'code' => '123ASD',
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(ActivateGiftCardPayResponseTemplate::$outgoingResponseFail);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_history_gift_cards()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_HISTORY_GIFT_CARDS);

        Http::fake([config('domains.pay.production.base_uri') . '/gift/history' => Http::response(
                HistoryGiftCardsPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.gift.history'), [
            'user_id' => 123,
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(HistoryGiftCardsPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invoice()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_INVOICE);

        Http::fake([config('domains.pay.production.base_uri') . '/payments/invoice' => Http::response(
                InvoicePayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.payments.invoice'), [
            'id' => 'd_123321',
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(InvoicePayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_balance_matcing_campaign_success()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_BALANCE_MATCHING_CAMPAIGN);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/campaign/get_balance' => Http::response(
                BalanceMatchingCampaignPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.matching.campaign.balance'), ['campaign_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(BalanceMatchingCampaignPayResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_balance_matcing_campaign_fail()
    {
        $token = $this->createEndpointToken(Controller::PAY_OFFICE_BALANCE_MATCHING_CAMPAIGN);

        Http::fake([config('domains.pay.production.base_uri') . '/matching/campaign/get_balance' => Http::response(
                BalanceMatchingCampaignPayResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.pay.office.matching.campaign.balance'), ['campaign_id' => 123]);

        $response
            ->assertStatus(200)
            ->assertExactJson(BalanceMatchingCampaignPayResponseTemplate::$outgoingResponse);
    }
}
