<?php

namespace App\Http\Controllers\V1\Crm;

use App\Domains\Crm\Actions\SearchPaymentCrmAction;
use App\Domains\Crm\Actions\StatsPaymentCrmAction;
use App\Domains\Crm\Dto\Request\SearchPaymentCrmRequestDto;
use App\Domains\Crm\Dto\Request\StatsPaymentCrmRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Crm\SearchPaymentCrmRequest;
use App\Http\Requests\Crm\StatsPaymentCrmRequest;
use App\Http\Resources\NoWrapResource;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/crm/finance/payments/search",
     *     tags={"Crm"},
     *     summary="Search Payments into CRM",
     *     description="Search Payments into CRM",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="filters",
     *          description="Filters set",
     *          in="query",
     *          @OA\Schema(
     *              type="array",
     *               @OA\Items(),
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="aggregates",
     *          description="aggregates",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="page",
     *          description="page",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="perPage",
     *          description="perPage",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="additional",
     *          description="additional",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SearchPaymentCrmResponseDto")
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
     * @throws \App\Exceptions\ApiLogicalException
     * @throws UnknownProperties
     */
    public function search(SearchPaymentCrmRequest $request, SearchPaymentCrmAction $action)
    {
        $this->authorizeToken(self::CRM_PAYMENT_SEARCH);
        $dto = new SearchPaymentCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/crm/finance/payments/stats",
     *     tags={"Crm"},
     *     summary="Stats finance payments Donors from CRM",
     *     description="Stats finance payments Donors from CRM",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="cases",
     *          description="cases",
     *          in="query",
     *          @OA\Schema(
     *              type="array",
     *               @OA\Items(),
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="cases",
     *          description="promo",
     *          in="query",
     *          @OA\Schema(
     *              type="array",
     *               @OA\Items(),
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StatsPaymentCrmResponseDto")
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
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
//    public function stats(StatsPaymentCrmRequest $request, StatsPaymentCrmAction $action)
//    {
//        $this->authorizeToken(self::CRM_PAYMENT_STATS);
//        $dto = new StatsPaymentCrmRequestDto($request->validated());
//        $resourceCollectionDto = $action->run($dto);
//
//        return DefaultResource::collection($resourceCollectionDto->collectionDto)
//            ->additional(['additional' => $resourceCollectionDto->additional])
//            ->response()->setStatusCode($resourceCollectionDto->statusCode);
//    }

    public function stats(StatsPaymentCrmRequest $request, StatsPaymentCrmAction $action)
    {
        $this->authorizeToken(self::CRM_PAYMENT_STATS);
        $dto = new StatsPaymentCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
