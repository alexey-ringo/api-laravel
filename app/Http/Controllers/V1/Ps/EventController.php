<?php

namespace App\Http\Controllers\V1\Ps;

use App\Domains\Ps\Actions\IndexEventPsAction;
use App\Domains\Ps\Actions\ShowUserIdEventPsAction;
use App\Domains\Ps\Dto\Request\IndexEventPsRequestDto;
use App\Domains\Ps\Dto\Request\ShowUserIdEventPsRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Ps\IndexEventPsRequest;
use App\Http\Requests\Ps\ShowUserIdEventPsRequest;
use App\Http\Resources\DefaultResource;

class EventController extends Controller
{
    const EVENT_INDEX = 'ps-event-index';
    const EVENT_SHOW = 'ps-event-show';
    const EVENT_SHOW_BY_USER = 'ps-event-show_by_user';
    const EVENT_STORE = 'ps-event-store';
    const EVENT_UPDATE = 'ps-event-update';
    const EVENT_DELETE = 'ps-event-delete';

    /**
     * @OA\Get(
     *     path="/ps/events",
     *     tags={"Ps"},
     *     summary="List all Events fron PS service",
     *     description="List all Events fron PS service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/EventPsResponseDataDto"),
     *             ),
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
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function index(IndexEventPsRequest $request, IndexEventPsAction $action)
    {
        $this->authorizeToken(self::EVENT_INDEX);
        $dto = new IndexEventPsRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/ps/events/user/{user_id}",
     *     tags={"Ps"},
     *     summary="Show Events fron PS service by user_id",
     *     description="Show Events fron PS service by user_id",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="count",
     *                 type="integer",
     *                 example="23",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/EventPsResponseDataDto"),
     *             ),
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
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function showByUserId(ShowUserIdEventPsRequest $request, int $id, ShowUserIdEventPsAction $action)
    {
        $this->authorizeToken(self::EVENT_SHOW_BY_USER);
        $dto = new ShowUserIdEventPsRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto, $id);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['count' => $resourceCollectionDto->count])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }
}
