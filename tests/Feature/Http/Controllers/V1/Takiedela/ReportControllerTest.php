<?php

namespace Tests\Feature\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Templates\Response\GetDonateReportsTakiedelaResponseTemplate;
use App\Domains\Takiedela\Templates\Response\SetDonateReportTakiedelaResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class ReportControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Takiedela
 */
class ReportControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * OrganizationControllerTest constructor.
     */
    public function __construct()
    {
//        $this->baseRemoteUri = config('domains.takiedela.production.base_uri');
        $this->baseRemoteUri = '';
        parent::__construct();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_donate_reports()
    {
        $token = $this->createEndpointToken(Controller::TAKIEDELA_GET_DONATE_REPORTS);

        Http::fake([config('domains.takiedela.production.base_uri') . '/reports*' => Http::response(
                GetDonateReportsTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.takiedela.donate.reports.get'));

        $response
            ->assertStatus(200)
            ->assertExactJson(GetDonateReportsTakiedelaResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_donate_report()
    {
        $token = $this->createEndpointToken(Controller::TAKIEDELA_SET_DONATE_REPORT);

        Http::fake([config('domains.takiedela.production.base_uri')  . '/reports_meta*' => Http::response(
                SetDonateReportTakiedelaResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.takiedela.donate.report.set'), ['post_id' => [1]]);

        $response
            ->assertStatus(200)
            ->assertExactJson(SetDonateReportTakiedelaResponseTemplate::$outgoingResponse);
    }
}
