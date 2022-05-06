<?php

namespace Tests\Feature\Http\Controllers\V1\Edu;

use App\Domains\Edu\Templates\Response\CourseCollectionEduResponseTemplate;
use App\Domains\Edu\Templates\Response\SearchCourseByUrlEduResponseTemplate;
use App\Http\Controllers\V1\Edu\CourseController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CourseControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Edu
 */
class CourseControllerTest extends TestCase
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
    public function test_list_user_courses_ok()
    {
        $token = $this->createEndpointToken(CourseController::COURSE_LIST);

        Http::fake([config('domains.edu.production.base_uri') . '/courses/get*' => Http::response(
                CourseCollectionEduResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.edu.courses.user.list'), ['id' => 123, 'email' => '67@ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(CourseCollectionEduResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_course_by_url_ok()
    {
        $token = $this->createEndpointToken(CourseController::EDU_COURSE_SEARCH_COURSE_BY_URL);

        Http::fake([config('domains.edu.production.base_uri') . '/v1/courses/searchByUrl*' => Http::response(
                SearchCourseByUrlEduResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.edu.courses.search-by-url'), ['url' => 'https://ya.ru']);

        $response
            ->assertStatus(200)
            ->assertExactJson(SearchCourseByUrlEduResponseTemplate::$outgoingResponse);
    }
}
