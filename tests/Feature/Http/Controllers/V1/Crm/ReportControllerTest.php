<?php

namespace Tests\Feature\Http\Controllers\V1\Crm;

use App\Domains\Crm\Templates\Response\AnnualUserReportCrmResponseTemplate;
use App\Domains\Crm\Templates\Response\StoreCounterpartyCrmResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class ReportControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Crm
 */
class ReportControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * ReportControllerTest constructor.
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
    public function test_annual_user_report()
    {
        $token = $this->createEndpointToken(Controller::CRM_REPORT_ANNUAL_USER_REPORT);
        $uuid = 'uuid';

        Http::fake([config('domains.crm.production.base_uri') . '/reports/annual-user-report/' . $uuid => Http::response(
                AnnualUserReportCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.crm.reports.annual-user-report', ['uuid' => $uuid]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(AnnualUserReportCrmResponseTemplate::$outgoingResponse);
    }
}
