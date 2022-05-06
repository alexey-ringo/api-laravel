<?php

namespace Tests\Feature\Http\Controllers\V1\Crm;

use App\Domains\Crm\Templates\Response\FilestorageCrmResponseTemplate;
use App\Http\Controllers\V1\Crm\CrmController;
use App\Http\Middleware\PrivateMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CrmControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Crm
 */
class CrmControllerTest extends TestCase
{
    use ApiDomainService, RefreshDatabase;

    protected string $baseRemoteUri;

    /**
     * CrmControllerTest constructor.
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
        $token = $this->createEndpointToken(CrmController::FILESTORAGE);

        Http::fake([config('domains.crm.production.base_uri') . '/filestorage' => Http::response(
                FilestorageCrmResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', 'v1/crm/filestorage',
            [
                'url' => 'https://www.ru',
                'provider' => 'provider'
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(FilestorageCrmResponseTemplate::$remoteResponse);
    }
}
