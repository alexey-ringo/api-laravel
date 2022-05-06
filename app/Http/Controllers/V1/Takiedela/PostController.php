<?php

namespace App\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Actions\PostsCountByCaseTakiedelaAction;
use App\Domains\Takiedela\Dto\Request\PostsCountByCaseTakiedelaRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Takiedela\PostsCountByCaseTakiedelaRequest;
use App\Http\Resources\NoWrapResource;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/takiedela/posts/count",
     *     tags={"Takiedela"},
     *     summary="Count Posts by Case",
     *     description="Count Posts by Case",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PostsCountByCaseTakiedelaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/PostsCountByCaseTakiedelaResponseDataDto"),
     *            ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="You do not have permissions to join this game!",
     *             ),
     *         ),
     *     ),
     * )
     *
     *
     * @return JsonResponse|object
     * @throws ApiLogicalException
     * @throws UnknownProperties
     */
    public function postsCountByCase(PostsCountByCaseTakiedelaRequest $request, PostsCountByCaseTakiedelaAction $action)
    {
        $this->authorizeToken(self::TAKIEDELA_POST_POSTS_COUNT_BY_CASE);
        $dto = new PostsCountByCaseTakiedelaRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
