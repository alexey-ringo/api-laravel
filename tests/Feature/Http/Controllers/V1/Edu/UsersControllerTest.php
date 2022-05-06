<?php

namespace Tests\Feature\Http\Controllers\V1\Edu;

use App\Domains\Edu\Templates\Response\CourseCollectionEduResponseTemplate;
use App\Domains\Edu\Templates\Response\IndexUsersTeachersEduResponseTemplate;
use App\Http\Controllers\V1\Controller;
use App\Http\Controllers\V1\Edu\CourseController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class UsersControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Edu
 */
class UsersControllerTest extends TestCase
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
    public function testListOk()
    {
        $token = $this->createEndpointToken(Controller::EDU_USERS_INDEX_USERS_TEACHERS);

        Http::fake([config('domains.edu.production.base_uri') . '/v1/users/teachers*' => Http::response(
                IndexUsersTeachersEduResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.edu.users.teachers.index'));

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexUsersTeachersEduResponseTemplate::$outgoingResponse);
    }
}
