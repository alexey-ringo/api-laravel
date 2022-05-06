<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Pay\Actions\CreateCardPayAction;
use App\Domains\Pay\Actions\DeleteCardPayAction;
use App\Domains\Pay\Actions\LinkedCardsByIdPayAction;
use App\Domains\Pay\Actions\LinkedCardsPayAction;
use App\Domains\Pay\Actions\SetMainCardPayAction;
use App\Domains\Pay\Dto\Request\CreateCardPayRequestDto;
use App\Domains\Pay\Dto\Request\LinkedCardByIdPayRequestDto;
use App\Domains\Pay\Dto\Request\ManageCardPayRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\CreateCardPayRequest;
use App\Http\Requests\Pay\ManageCardPayRequest;
use App\Http\Requests\Pay\LinkedCardByIdPayRequest;
use App\Http\Requests\Pay\LinkedCardPayRequest;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CardController extends Controller
{
    /**
     * Fetch users linked cards by user_token from Auth and Payment Services.
     *
     * @OA\Post(
     *     path="/pay/cards/by-user-token",
     *     operationId="getCardsByUserToken",
     *     tags={"Pay"},
     *     summary="Fetch users linked cards by user_token from Auth and Payment Services",
     *     description="Fetch users linked cards by user_token from Auth and Payment Services",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LinkedCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/LinkedCardCollectionPayResponseDto"),
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
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function getCardsByUserToken(LinkedCardPayRequest $request, LinkedCardsPayAction $action)
    {
        $this->authorizeToken(self::PAY_CARD_LINKED_CARDS_BY_USER_TOKEN);
        $dto = new FetchUserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Fetch users linked cards by user_id from Auth and Payment Services.
     *
     * @OA\Post(
     *     path="/pay/cards/by-user-id",
     *     operationId="getCardsByUserId",
     *     tags={"Pay"},
     *     summary="Fetch users linked cards by user_id from Auth and Payment Services",
     *     description="Fetch users linked cards by user_id from Auth and Payment Services",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LinkedCardByIdPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/LinkedCardCollectionPayResponseDto"),
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
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function getCardsByUserId(LinkedCardByIdPayRequest $request, LinkedCardsByIdPayAction $action)
    {
        $this->authorizeToken(self::PAY_CARD_LINKED_CARDS_BY_ID);
        $dto = new LinkedCardByIdPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Delete User linked card on Payment Services.
     *
     * @OA\Post(
     *     path="/pay/cards/delete",
     *     operationId="deleteCard",
     *     tags={"Pay"},
     *     summary="Delete User linked card on Payment Services",
     *     description="Delete User linked card on Payment Services",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ManageCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StatusStringResponseDto"),
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
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function delete(ManageCardPayRequest $request, DeleteCardPayAction $action)
    {
        $this->authorizeToken(self::PAY_CARD_DELETE_CARD);
        $dto = new ManageCardPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Create new card for User on Payment Services.
     *
     * @OA\Post(
     *     path="/pay/cards/create",
     *     operationId="createCard",
     *     tags={"Pay"},
     *     summary="Create new card for User on Payment Services",
     *     description="Create new card for User on Payment Services",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CloudPaymentPayResponseDto"),
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
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function create(CreateCardPayRequest $request, CreateCardPayAction $action)
    {
        $this->authorizeToken(self::PAY_CARD_CREATE_CARD);
        $dto = new CreateCardPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Set main card for User on Payment Services.
     *
     * @OA\Post(
     *     path="/pay/cards/main",
     *     operationId="setMainCard",
     *     tags={"Pay"},
     *     summary="Set main card for User on Payment Services",
     *     description="Set main card for User on Payment Services",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ManageCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StatusStringResponseDto"),
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
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function setMain(ManageCardPayRequest $request, SetMainCardPayAction $action)
    {
        $this->authorizeToken(self::PAY_CARD_SET_MAIN_CARD);
        $dto = new ManageCardPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
