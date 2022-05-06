<?php

namespace Tests\Feature\Http\Controllers\V1\Comments;

use App\Domains\Comments\Templates\Response\DeleteCommentCommentsResponseTemplate;
use App\Domains\Comments\Templates\Response\IndexCommentCommentsResponseTemplate;
use App\Domains\Comments\Templates\Response\SetCommentCommentsResponseTemplate;
use App\Domains\Comments\Templates\Response\SetThreadCommentsResponseTemplate;
use App\Http\Controllers\V1\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\ApiDomainService;
use Tests\TestCase;

/**
 * Class CommentControllerTest
 * @package Tests\Feature\Http\Controllers\V1\Comments
 */
class CommentControllerTest extends TestCase
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
    public function test_index()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_INDEX);

        Http::fake([config('domains.comments.production.base_uri') . '/comments*' => Http::response(
                IndexCommentCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.comments.index'),
            ['project' => 'ps', 'resource_type' => 'collection', 'resource_id' => 1]
        );

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexCommentCommentsResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_by_donation_id()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_GET_BY_DONATION_ID);

        Http::fake([config('domains.comments.production.base_uri') . '/comments/getByDonationId*' => Http::response(
                IndexCommentCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('get', route('api.v1.comments.get-by-donation-id'),
            ['ids' => [1,2,3]]
        );

        $response
            ->assertStatus(200)
            ->assertExactJson(IndexCommentCommentsResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_CREATE);

        Http::fake([config('domains.comments.production.base_uri') . '/comments/create' => Http::response(
                SetCommentCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.comments.create'),
            ['body' => 'text', 'email' => 'email@mail.ru', 'project' => 'ps', 'resource_type' => 'collection', 'resource_id' => 1]
        );

        $response
            ->assertStatus(200)
            ->assertExactJson(SetCommentCommentsResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_UPDATE);
        $id = 1;

        Http::fake([config('domains.comments.production.base_uri') . '/comments/update/' . $id => Http::response(
                SetCommentCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.comments.update', ['id' => $id]), ['body' => 'text']);

        $response
            ->assertStatus(200)
            ->assertExactJson(SetCommentCommentsResponseTemplate::$outgoingResponse);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_thread()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_THREAD);

        Http::fake([config('domains.comments.production.base_uri') . '/thread' => Http::response(
                SetThreadCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post', route('api.v1.comments.thread'),
            [
                'user_id' => 123,
                'thread_id' => 123
            ]);

        $response
            ->assertStatus(200)
            ->assertExactJson(SetThreadCommentsResponseTemplate::$outgoingResponse);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete()
    {
        $token = $this->createEndpointToken(Controller::COMMENTS_COMMENT_DELETE);
        $id = 1;

        Http::fake([config('domains.comments.production.base_uri') . '/comments/delete/' . $id => Http::response(
                DeleteCommentCommentsResponseTemplate::$remoteResponse, 200)]
        );
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('delete', route('api.v1.comments.delete', ['id' => $id]), []);

        $response
            ->assertStatus(200)
            ->assertExactJson(DeleteCommentCommentsResponseTemplate::$outgoingResponse);
    }
}
