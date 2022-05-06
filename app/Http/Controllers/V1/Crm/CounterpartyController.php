<?php

namespace App\Http\Controllers\V1\Crm;

use App\Domains\Crm\Actions\AttachCounterpartyCrmAction;
use App\Domains\Crm\Actions\SearchCounterpartyCrmAction;
use App\Domains\Crm\Actions\ShowCounterpartyCrmAction;
use App\Domains\Crm\Actions\StoreCounterpartyCrmAction;
use App\Domains\Crm\Actions\SubscriptionUpgradeCounterpartyCrmAction;
use App\Domains\Crm\Actions\SyncCounterpartyCrmAction;
use App\Domains\Crm\Actions\UpdateSubscriptionUpgradeCounterpartyCrmAction;
use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Dto\Base\RawCrmRequestDto;
use App\Domains\Crm\Dto\Request\SearchCounterpartyCrmRequestDto;
use App\Domains\Crm\Dto\Request\StoreCounterpartyCrmRequestDto;
use App\Domains\Crm\Dto\Request\SubscriptionUpgradeCounterpartyCrmRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Crm\SearchCounterpartyCrmRequest;
use App\Http\Requests\Crm\StoreCounterpartyCrmRequest;
use App\Http\Requests\Crm\SubscriptionUpgradeCounterpartyCrmRequest;
use App\Http\Resources\NoWrapResource;
use App\Parents\Dto\Response\EmptyResponseDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CounterpartyController extends Controller
{
    /**
     * @OA\Post(
     *     path="/crm/counterparties",
     *     tags={"Crm"},
     *     summary="Store Counterparty to CRM",
     *     description="Store Counterparty to CRM",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreCounterpartyCrmRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CounterpartyCrmResponseDto")
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
    public function store(StoreCounterpartyCrmRequest $request, StoreCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_STORE);
        $dto = new StoreCounterpartyCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/crm/counterparties/{id}",
     *     tags={"Crm"},
     *     summary="Get Counterparty fron CRM by uuid",
     *     description="Get Counterparty fron CRM by uuid",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Counterparty uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CounterpartyCrmResponseDto")
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
     * @throws UnknownProperties
     */
    public function show(string $uuid, ShowCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_SHOW);
        //Заглушка для сохранения единого интерфейса абстрактоной CRM Task
        $dto = new BaseCrmRequestDto;
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/crm/counterparties/search",
     *     tags={"Crm"},
     *     summary="Search Counterparty fron CRM by email or phone",
     *     description="Search Counterparty fron CRM by email or phone",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="email",
     *          description="Counterparty email",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="phone",
     *          description="Counterparty phone",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="model_type",
     *          description="Counterparty model type",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CounterpartyCrmResponseDto")
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
    public function search(SearchCounterpartyCrmRequest $request, SearchCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_SEARCH);
        $dto = new SearchCounterpartyCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Info about Upgrade Counterparty subscription.
     *
     * @OA\Get(
     *     path="/crm/counterparties/subscription-upgrade/{uuid}",
     *     operationId="showSubscriptionUpgrade",
     *     tags={"Crm"},
     *     summary="Info about Upgrade Counterparty subscription",
     *     description="Info about Upgrade Counterparty subscription",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="view",
     *         description="view",
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SubscriptionUpgradeCounterpartyCollectionCrmResponseDto"),
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
     */
    public function subscriptionUpgrade(SubscriptionUpgradeCounterpartyCrmRequest $request, string $uuid, SubscriptionUpgradeCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_SUBSCRIPTION_UPGRADE);
        $dto = new SubscriptionUpgradeCounterpartyCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update info about Upgrade Counterparty subscription.
     *
     * @OA\Post (
     *     path="/crm/counterparties/subscription-upgrade/{uuid}",
     *     operationId="updateSubscriptionUpgrade",
     *     tags={"Crm"},
     *     summary="Update info about Upgrade Counterparty subscription",
     *     description="Update info about Upgrade Counterparty subscription",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UpdateSubscriptionUpgradeCounterpartyCrmResponseDto"),
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
     */
    public function updateSubscriptionUpgrade(Request $request, string $uuid, UpdateSubscriptionUpgradeCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_UPDATE_SUBSCRIPTION_UPGRADE);
        $dto = new RawCrmRequestDto(requestData: $request->all());
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Attach Counterparty profile.
     *
     * @OA\Post(
     *     path="/crm/counterparties/attach/{provider}",
     *     operationId="attach",
     *     tags={"Crm"},
     *     summary="Attach Counterparty profile",
     *     description="Attach Counterparty profile",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(ref="#/components/schemas/EmptyResponseDto")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AttachCounterpartyCrmResponseDto"),
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
    public function attach(Request $request, string $provider, AttachCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_ATTACH);
        $dto = new RawCrmRequestDto(requestData: $request->all());
        $resourceResponseDto = $action->run($dto, $provider);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Attach Counterparty profile.
     *
     * @OA\Post(
     *     path="/crm/counterparties/sync/{provider}",
     *     operationId="sync",
     *     tags={"Crm"},
     *     summary="Sync Counterparty",
     *     description="Attach Counterparty profile",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=false,
     *         @OA\JsonContent(ref="#/components/schemas/EmptyResponseDto")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/EmptyResponseDto"),
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
    public function sync(Request $request, string $provider, SyncCounterpartyCrmAction $action)
    {
        $this->authorizeToken(self::CRM_COUNTERPARTY_SYNC);
        $dto = new RawCrmRequestDto(requestData: $request->all());
        $resourceResponseDto = $action->run($dto, $provider);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
