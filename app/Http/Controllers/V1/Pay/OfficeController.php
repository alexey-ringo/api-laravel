<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Pay\Actions\ActivateGiftCardPayAction;
use App\Domains\Pay\Actions\BalanceMatchingCampaignPayAction;
use App\Domains\Pay\Actions\HistoryGiftCardsPayAction;
use App\Domains\Pay\Actions\IndexMatchingCampaignPayAction;
use App\Domains\Pay\Actions\IndexPaymentPayAction;
use App\Domains\Pay\Actions\IndexSubscriptionPayAction;
use App\Domains\Pay\Actions\InvoicePayAction;
use App\Domains\Pay\Actions\SetMatchingCampaignPayAction;
use App\Domains\Pay\Actions\SetMatchingOrganizationPayAction;
use App\Domains\Pay\Actions\ShowMatchingOrganizationPayAction;
use App\Domains\Pay\Actions\OfficeUserMetricsPayAction;
use App\Domains\Pay\Dto\Request\ActivateGiftCardPayRequestDto;
use App\Domains\Pay\Dto\Request\BalanceMatchingCampaignPayRequestDto;
use App\Domains\Pay\Dto\Request\HistoryGiftCardsPayRequestDto;
use App\Domains\Pay\Dto\Request\IndexMatchingCampaignPayRequestDto;
use App\Domains\Pay\Dto\Request\IndexPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\IndexSubscriptionPayRequestDto;
use App\Domains\Pay\Dto\Request\InvoicePayRequestDto;
use App\Domains\Pay\Dto\Request\SetMatchingCampaignPayRequestDto;
use App\Domains\Pay\Dto\Request\SetMatchingOrganizationPayRequestDto;
use App\Domains\Pay\Dto\Request\ShowMatchingOrganizationPayRequestDto;
use App\Domains\Pay\Dto\Request\OfficeUserMetricsPayRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\ActivateGiftCardPayRequest;
use App\Http\Requests\Pay\BalanceMatchingCampaignPayRequest;
use App\Http\Requests\Pay\HistoryGiftCardsPayRequest;
use App\Http\Requests\Pay\IndexMatchingCampaignPayRequest;
use App\Http\Requests\Pay\IndexPaymentPayRequest;
use App\Http\Requests\Pay\IndexSubscriptionPayRequest;
use App\Http\Requests\Pay\InvoicePayRequest;
use App\Http\Requests\Pay\SetMatchingCampaignPayRequest;
use App\Http\Requests\Pay\SetMatchingOrganizationPayRequest;
use App\Http\Requests\Pay\ShowMatchingOrganizationPayRequest;
use App\Http\Requests\Pay\OfficeUserMetricsPayRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class OfficeController extends Controller
{
    /**
     * Payments collection Data for Office from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/office/payments",
     *     operationId="indexPayments",
     *     tags={"Office"},
     *     summary="User Payments collection for Office from Payment Gateway",
     *     description="User Payments collection for Office from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         @OA\Schema(type="boolean"),
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
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="only_signup",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/PaymentCollectionPayResponseDto"),
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
     * @throws ApiPermissionDeniedException
     */
    public function indexPayments(IndexPaymentPayRequest $request, IndexPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_INDEX_PAYMENTS);
        $dto = new IndexPaymentPayRequestDto($request->validated());
//        $resourceCollectionDto = $action->run($dto);
        $resourceResponseDto = $action->run($dto);

//        return DefaultResource::collection($resourceCollectionDto->collectionDto)
//            ->additional(['count' => $resourceCollectionDto->count])
//            ->response()->setStatusCode($resourceCollectionDto->statusCode);
        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Subscriptions collection for Office from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/office/signups",
     *     operationId="indexSignups",
     *     tags={"Office"},
     *     summary="List User Subscriptions collection for Office from Payment Gateway",
     *     description="List User Subscriptions collection for Office from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
     *     @OA\Parameter(
     *         name="active",
     *         in="query",
     *         @OA\Schema(type="boolean"),
     *     ),
     *     @OA\Parameter(
     *         name="case",
     *         in="query",
     *         @OA\Schema(type="array", @OA\Items()),
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SubscriptionCollectionPayResponseDto"),
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
     * @throws ApiPermissionDeniedException
     */
    public function indexSubscriptions(IndexSubscriptionPayRequest $request, IndexSubscriptionPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_INDEX_SIGNUPS);
        $dto = new IndexSubscriptionPayRequestDto($request->validated());
//        $resourceCollectionDto = $action->run($dto);
        $resourceResponseDto = $action->run($dto);

//        return DefaultResource::collection($resourceCollectionDto->collectionDto)
//            ->additional(['count' => $resourceCollectionDto->count])
//            ->response()->setStatusCode($resourceCollectionDto->statusCode);
        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show office user Metrics from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/office/metrics/user",
     *     operationId="showUserMetrics",
     *     tags={"Office"},
     *     summary="Show office user Metrics from Payment Gateway",
     *     description="Show office user Metrics from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ManageCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/UserMetricsDonationPayResponseDto"
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
     * @throws ApiLogicalException|UnknownProperties|ApiPermissionDeniedException
     */
    public function showUserMetrics(OfficeUserMetricsPayRequest $request, OfficeUserMetricsPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_SHOW_USER_METRICS);
        $dto = new OfficeUserMetricsPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show Office Matching Organization from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/office/matching/organization",
     *     operationId="showMatchingOrganization",
     *     tags={"Office"},
     *     summary="Show Office Matching Organization from Payment Gateway",
     *     description="Show Office Matching Organization from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ManageCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/MatchingOrganizationPayResponseDto"),
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
    public function showMatchingOrganization(ShowMatchingOrganizationPayRequest $request, ShowMatchingOrganizationPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_SHOW_MATCHING_ORGANIZATION);
        $dto = new ShowMatchingOrganizationPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Set Office Matching Organization from Payment Gateway.
     *
     * @OA\Post(
     *     path="/pay/office/matching/organization",
     *     operationId="setMatchingOrganization",
     *     tags={"Office"},
     *     summary="Set Office Matching Organization from Payment Gateway",
     *     description="Set Office Matching Organization from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ManageCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="string",
     *                 example="Success"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Message"
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
    public function setMatchingOrganization(SetMatchingOrganizationPayRequest $request, SetMatchingOrganizationPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_SET_MATCHING_ORGANIZATION);
        $dto = new SetMatchingOrganizationPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Index Office Matching Campaign from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/office/matching/campaigns",
     *     operationId="indexMatchingCampaigns",
     *     tags={"Office"},
     *     summary="Index Office Matching Campaign from Payment Gateway",
     *     description="Index Office Matching Campaign from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="type",
     *         in="query",
     *         @OA\Schema(type="boolean"),
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
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="only_signup",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SubscriptionCollectionPayResponseDto"),
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
    public function indexMatchingCampaigns(IndexMatchingCampaignPayRequest $request, IndexMatchingCampaignPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_INDEX_MATCHING_CAMPAIGNS);
        $dto = new IndexMatchingCampaignPayRequestDto($request->validated());
//        $resourceCollectionDto = $action->run($dto);
        $resourceResponseDto = $action->run($dto);

//        return DefaultResource::collection($resourceCollectionDto->collectionDto)
//            ->additional(['count' => $resourceCollectionDto->count])
//            ->response()->setStatusCode($resourceCollectionDto->statusCode);
        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Set Office Matching Campaign to Payment Gateway.
     *
     * @OA\Post(
     *     path="/pay/office/matching/campaigns",
     *     operationId="setMatchingCampaign",
     *     tags={"Office"},
     *     summary="Set Office Matching Campaign to Payment Gateway",
     *     description="Set Office Matching Campaign to Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SetMatchingCampaignPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/MatchingCampaignResponseDto"),
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
    public function setMatchingCampaign(SetMatchingCampaignPayRequest $request, SetMatchingCampaignPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_CREATE_MATCHING_CAMPAIGN);
        $dto = new SetMatchingCampaignPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Office Activate gift card to Payment Gateway.
     *
     * @OA\Post(
     *     path="/pay/office/gift/activate",
     *     operationId="activateGiftCard",
     *     tags={"Office"},
     *     summary="Office Activate gift card to Payment Gateway",
     *     description="Office Activate gift card to Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivateGiftCardPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/ActivateGiftCardPayResponseDto"),
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
    public function activateGiftCard(ActivateGiftCardPayRequest $request, ActivateGiftCardPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_ACTIVATE_GIFT_CARD);
        $dto = new ActivateGiftCardPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Set Office Matching Organization from Payment Gateway.
     *
     * @OA\Post(
     *     path="/pay/office/gift/history",
     *     operationId="historyGiftCards",
     *     tags={"Office"},
     *     summary="Set Office Matching Organization from Payment Gateway",
     *     description="Set Office Matching Organization from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/HistoryGiftCardsPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/GiftCardCollectionPayResponseDto"),
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
    public function historyGiftCards(HistoryGiftCardsPayRequest $request, HistoryGiftCardsPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_HISTORY_GIFT_CARDS);
        $dto = new HistoryGiftCardsPayRequestDto($request->validated());
//        $resourceCollectionDto = $action->run($dto);
        $resourceResponseDto = $action->run($dto);

//        return DefaultResource::collection($resourceCollectionDto->collectionDto)
//            ->response()->setStatusCode($resourceCollectionDto->statusCode);
        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Get Office payments Invoice from Payment Gateway.
     *
     * @OA\Post(
     *     path="/pay/office/payments/invoice",
     *     operationId="paymentsInvoice",
     *     tags={"Office"},
     *     summary="Get Office payments Invoice from Payment Gateway",
     *     description="Get Office payments Invoice from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/InvoicePayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/InvoicePayResponseDto"),
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
    public function invoice(InvoicePayRequest $request, InvoicePayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_INVOICE);
        $dto = new InvoicePayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Get Balance of Matching Campaign.
     *
     * @OA\Post(
     *     path="/pay/office/matching/campaign/balance",
     *     operationId="balanceMatchingCampaign",
     *     tags={"Office"},
     *     summary="Get Balance of Matching Campaign",
     *     description="Get Balance of Matching Campaign",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BalanceMatchingCampaignPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/BalanceMatchingCampaignPayResponseDto"),
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
    public function balanceMatchingCampaign(BalanceMatchingCampaignPayRequest $request, BalanceMatchingCampaignPayAction $action)
    {
        $this->authorizeToken(self::PAY_OFFICE_BALANCE_MATCHING_CAMPAIGN);
        $dto = new BalanceMatchingCampaignPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
