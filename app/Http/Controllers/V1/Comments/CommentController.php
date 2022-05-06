<?php

namespace App\Http\Controllers\V1\Comments;

use App\Domains\Comments\Actions\CreateCommentCommentsAction;
use App\Domains\Comments\Actions\DeleteCommentCommentsAction;
use App\Domains\Comments\Actions\GetByDonationIdCommentsAction;
use App\Domains\Comments\Actions\IndexCommentCommentsAction;
use App\Domains\Comments\Actions\SetThreadCommentsAction;
use App\Domains\Comments\Actions\UpdateCommentCommentsAction;
use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;
use App\Domains\Comments\Dto\Request\CreateCommentCommentsRequestDto;
use App\Domains\Comments\Dto\Request\GetByDonationIdCommentsRequestDto;
use App\Domains\Comments\Dto\Request\IndexCommentCommentsRequestDto;
use App\Domains\Comments\Dto\Request\SetThreadCommentsRequestDto;
use App\Domains\Comments\Dto\Request\UpdateCommentCommentsRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Comments\CreateCommentCommentsRequest;
use App\Http\Requests\Comments\GetByDonationIdCommentsRequest;
use App\Http\Requests\Comments\IndexCommentCommentsRequest;
use App\Http\Requests\Comments\SetThreadCommentsRequest;
use App\Http\Requests\Comments\UpdateCommentCommentsRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CommentController extends Controller
{
    /**
     * Comments collection Data from Comments Service.
     *
     * @OA\Get(
     *     path="/comments",
     *     operationId="indexComments",
     *     tags={"Comments"},
     *     summary="Comments collection Data from Comments Service",
     *     description="Comments collection Data from Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="project",
     *          description="project",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="resource_type",
     *          description="resource_type",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="resource_id",
     *          description="resource_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CommentCollectionCommentsResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function index(IndexCommentCommentsRequest $request, IndexCommentCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_INDEX);
        $dto = new IndexCommentCommentsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Get Comments collection by donation_id from Comments Service.
     *
     * @OA\Get(
     *     path="/comments/get-by-donation-id",
     *     operationId="getByDonationId",
     *     tags={"Comments"},
     *     summary="Get Comments collection by donation_id from Comments Service",
     *     description="Get Comments collection by donation_id from Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="ids",
     *          description="donation_id array",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="array",
     *               @OA\Items(),
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CommentCollectionCommentsResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function getByDonationId(GetByDonationIdCommentsRequest $request, GetByDonationIdCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_GET_BY_DONATION_ID);
        $dto = new GetByDonationIdCommentsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Create new Comment on Comments Service.
     *
     * @OA\Post (
     *     path="/comments/create",
     *     operationId="createComments",
     *     tags={"Comments"},
     *     summary="Create new Comment on Comments Service",
     *     description="Create new Comment on Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateCommentCommentsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CommentCommentsResponseDataDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
    public function create(CreateCommentCommentsRequest $request, CreateCommentCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_CREATE);
        $dto = new CreateCommentCommentsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Set last read thread on Comments Service.
     *
     * @OA\Post (
     *     path="/comments/thread",
     *     operationId="setCommentsThread",
     *     tags={"Comments"},
     *     summary="Set last read thread on Comments Service",
     *     description="Set last read thread on Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SetThreadCommentsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/ThreadCommentsResponseDataDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
    public function thread(SetThreadCommentsRequest $request, SetThreadCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_THREAD);
        $dto = new SetThreadCommentsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update Comment on Comments Service.
     *
     * @OA\Post (
     *     path="/comments/update/{id}",
     *     operationId="updateComments",
     *     tags={"Comments"},
     *     summary="Update Comment on Comments Service",
     *     description="Update Comment on Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCommentCommentsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CommentCommentsResponseDataDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
    public function update(UpdateCommentCommentsRequest $request, int $id, UpdateCommentCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_UPDATE);
        $dto = new UpdateCommentCommentsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $id);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Delete Comment on Comments Service.
     *
     * @OA\Delete  (
     *     path="/comments/delete/{id}",
     *     operationId="deleteComments",
     *     tags={"Comments"},
     *     summary="Delete Comment on Comments Service",
     *     description="Delete Comment on Comments Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/MessageStringResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws ApiPermissionDeniedException
     */
    public function delete(int $id, DeleteCommentCommentsAction $action)
    {
        $this->authorizeToken(self::COMMENTS_COMMENT_DELETE);
        $dto = new BaseCommentsRequestDto();
        $resourceResponseDto = $action->run($dto, $id);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
