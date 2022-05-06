<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Pay\Actions\ListPaymentsByIdsPayAction;
use App\Domains\Pay\Dto\Request\ListPaymentsByIdsPayRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\ListPaymentsByIdsPayRequest;
use App\Http\Resources\NoWrapResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PaymentController extends Controller
{
    /**
     * Payments List by ids from Payment Gateway.
     *
     * @OA\Get(
     *     path="/pay/payments/list-by-ids",
     *     operationId="listPaymentsByIds",
     *     tags={"Pay"},
     *     summary="Payments List by ids from Payment Gateway",
     *     description="Payments List by ids from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="ids",
     *          description="Payments ids",
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
     *         @OA\JsonContent(ref="#/components/schemas/PaymentsInfoCollectionPayResponseDto"),
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
    public function listPaymentsByIds(ListPaymentsByIdsPayRequest $request, ListPaymentsByIdsPayAction $action)
    {
        $this->authorizeToken(self::PAY_PAYMENT_LIST_PAYMENTS_BY_IDS);
        $dto = new ListPaymentsByIdsPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        //TODO: Переделать на норм коллекцию
//        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
        return response()->json($resourceResponseDto->responseDto->toArrayNoGaps(), $resourceResponseDto->statusCode);
    }
}
