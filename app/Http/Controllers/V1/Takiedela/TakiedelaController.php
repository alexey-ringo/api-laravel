<?php

namespace App\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Actions\FundraisingTakiedelaAction;
use App\Domains\Takiedela\Actions\NewsTakiedelaAction;
use App\Domains\Takiedela\Actions\TopicsTakiedelaAction;
use App\Domains\Takiedela\Dto\Request\PostsTakiedelaRequestDto;
use App\Domains\Takiedela\Dto\Request\TopicsTakiedelaRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Takiedela\PostsTakiedelaRequest;
use App\Http\Requests\Takiedela\TopicsTakiedelaRequest;
use App\Http\Resources\DefaultResource;

class TakiedelaController extends Controller
{
    const NEWS = 'takiedela-news';
    const FUNDRAISING = 'takiedela-fundraising';
    const TOPICS = 'takiedela-topics';

    /**
     * @OA\Get(
     *     path="/takiedela/news",
     *     tags={"Takiedela"},
     *     summary="Get News from Takiedela.",
     *     description="Returns News data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="case_id",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="from",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="to",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="orderby",
     *         description="sorting parameter",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="order",
     *         description="sorting type",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/PostsTakiedelaResponseDto")
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
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function news(PostsTakiedelaRequest $request, NewsTakiedelaAction $action)
    {
        $this->authorizeToken(self::NEWS);
        $dto = new PostsTakiedelaRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/takiedela/fr",
     *     tags={"Takiedela"},
     *     summary="Get Fundraising posts from Takiedela.",
     *     description="Returns Fundraising posts data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="case_id",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="from",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="to",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="orderby",
     *         description="sorting parameter",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="order",
     *         description="sorting type",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/PostsTakiedelaResponseDto")
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
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function fundraisingPosts(PostsTakiedelaRequest $request, FundraisingTakiedelaAction $action)
    {
        $this->authorizeToken(self::FUNDRAISING);
        $dto = new PostsTakiedelaRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     *
     * @OA\Get(
     *     path="/takiedela/topics",
     *     tags={"Takiedela"},
     *     summary="Get refs on cases from Takiedela.",
     *     description="Returns ewfs on cases data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="case_id",
     *         description="case id",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items()
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/TopicsTakiedelaResponseDto")
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
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @throws \App\Exceptions\ApiLogicalException
     */
    public function topics(TopicsTakiedelaRequest $request, TopicsTakiedelaAction $action)
    {
        $this->authorizeToken(self::TOPICS);
        $dto = new TopicsTakiedelaRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
