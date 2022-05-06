<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Pay\Actions\CloudPaymentTokenPayAction;
use App\Domains\Pay\Actions\LinkedCardsByIdPayAction;
use App\Domains\Pay\Actions\LinkedCardsPayAction;
use App\Domains\Pay\Actions\CloudPaymentPayAction;
use App\Domains\Pay\Actions\YookassaPayAction;
use App\Domains\Pay\Dto\Request\CloudPaymentTokenPayRequestDto;
use App\Domains\Pay\Dto\Request\CloudPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\RequestYookassaPayRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\CloudPaymentTokenPayRequest;
use App\Http\Requests\Pay\LinkedCardByIdPayRequest;
use App\Http\Requests\Pay\LinkedCardPayRequest;
use App\Http\Requests\Pay\CloudPaymentPayRequest;
use App\Http\Requests\Pay\YookassaPayRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PayController extends Controller
{
    const CLOUD_PAYMENT = 'pay-cloud_payment';
    const CLOUD_PAYMENT_TOKEN = 'pay-cloud_payment_token';

    /**
     * Check auth users from Auth Service.
     *
     * @OA\Post(
     *     path="/pay/cp",
     *     operationId="cloudPayment",
     *     tags={"Pay"},
     *     summary="Request CloudPayment payment from Payment Service",
     *     description="Returns requested CloudPayment payment status",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CloudPaymentPayResponseDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     example="Failure"
     *                 ),
     *                 @OA\Property(
     *                     property="code",
     *                     type="integer",
     *                     example=3,
     *                 ),
     *                 @OA\Property(
     *                     property="PaReq",
     *                     type="string",
     *                     example="<link to redirect>",
     *                 ),
     *             ),
     *         ),
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
    public function cloudPayment(CloudPaymentPayRequest $request, CloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::CLOUD_PAYMENT);
        $dto = new CloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Payment through CloudPayment with users Auth JWT-token.
     *
     * @OA\Post(
     *     path="/pay/cp-token",
     *     operationId="cloudPaymentToken",
     *     tags={"Pay"},
     *     summary="Payment through CloudPayment with users Auth JWT-token",
     *     description="Payment through CloudPayment with users Auth JWT-token",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CloudPaymentTokenPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CloudPaymentPayResponseDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     example="Failure"
     *                 ),
     *                 @OA\Property(
     *                     property="code",
     *                     type="integer",
     *                     example=3,
     *                 ),
     *                 @OA\Property(
     *                     property="PaReq",
     *                     type="string",
     *                     example="<link to redirect>",
     *                 ),
     *             ),
     *         ),
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
    public function cloudPaymentToken(CloudPaymentTokenPayRequest $request, CloudPaymentTokenPayAction $action)
    {
        $this->authorizeToken(self::CLOUD_PAYMENT_TOKEN);
        $requestArr = [];
        $requestArr = $request->validated();
        $requestArr['user_id'] = 0;
        $requestArr['email'] = '';
        $dto = new CloudPaymentTokenPayRequestDto($requestArr);
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
