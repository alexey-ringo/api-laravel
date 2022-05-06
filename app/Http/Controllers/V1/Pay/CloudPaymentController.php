<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Pay\Actions\CloudPaymentTokenPayAction;
use App\Domains\Pay\Actions\CreateCloudPaymentPayAction;
use App\Domains\Pay\Actions\DeactivateCloudPaymentPayAction;
use App\Domains\Pay\Actions\RestoreCloudPaymentPayAction;
use App\Domains\Pay\Actions\UpdateCloudPaymentPayAction;
use App\Domains\Pay\Actions\UpdateCommissionCloudPaymentPayAction;
use App\Domains\Pay\Dto\Request\CloudPaymentTokenPayRequestDto;
use App\Domains\Pay\Dto\Request\CreateCloudPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\DeactivateCloudPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\RestoreCloudPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\UpdateCloudPaymentPayRequestDto;
use App\Domains\Pay\Dto\Request\UpdateCommissionCloudPaymentPayRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\CloudPaymentTokenPayRequest;
use App\Http\Requests\Pay\CreateCloudPaymentPayRequest;
use App\Http\Requests\Pay\DeactivateCloudPaymentPayRequest;
use App\Http\Requests\Pay\RestoreCloudPaymentPayRequest;
use App\Http\Requests\Pay\UpdateCloudPaymentPayRequest;
use App\Http\Requests\Pay\UpdateCommissionCloudPaymentPayRequest;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CloudPaymentController extends Controller
{

    /**
     * @OA\Examples(
     *     summary="Success Response Example",
     *     example = "CpSuccessResponseEcample",
     *     value = {
     *         "status": "Success",
     *         "message": "New subscription 1234",
     *         "data": { "Subscription object" },
     *     },
     * )
     */

    /**
     * @OA\Examples(
     *     summary="Redirect Response Example",
     *     example = "CpRedirectResponseExample",
     *     value = {
     *         "status": "Failure",
     *         "code": "3",
     *         "PaReq": "<link to redirect>",
     *         "MD": "23451",
     *         "TermUrl": "<link to redirect>",
     *         "AcsUrl": "<link to redirect>",
     *     },
     * )
     */

    /**
     * @OA\Examples(
     *     summary="Failure Response Example",
     *     example = "CpFailureResponseExample",
     *     value = {
     *         "status": "Failure",
     *         "message": "Error description",
     *     },
     * )
     */

    /**
     * @OA\Schema(
     *     schema="CpSuccessResponse",
     *     title="Success Response",
     *     description="Success Response",
     *     @OA\Property(
     *         property="status",
     *         type="string",
     *         example="Success"
     *     ),
     *     @OA\Property(
     *         property="message",
     *         type="string",
     *         example="New subscription 1234",
     *     ),
     *     @OA\Property(
     *         property="data",
     *         type="object",
     *         ref="#/components/schemas/SubscriptionPayResponseDataDto",
     *     ),
     * ),
     */

    /**
     * @OA\Schema(
     *     schema="CpRedirectResponse",
     *     title="Redirect Response",
     *     description="Redirect Response",
     *     @OA\Property(
     *         property="status",
     *         type="string",
     *         example="Failure"
     *     ),
     *     @OA\Property(
     *         property="code",
     *         type="integer",
     *         example="3",
     *     ),
     *     @OA\Property(
     *         property="PaReq",
     *         type="string",
     *         example="<link to redirect>",
     *     ),
     *     @OA\Property(
     *         property="MD",
     *         type="integer",
     *         example="23451",
     *     ),
     *     @OA\Property(
     *         property="TermUrl",
     *         type="string",
     *         example="<link to redirect>",
     *     ),
     *     @OA\Property(
     *         property="AcsUrl",
     *         type="string",
     *         example="<link to redirect>",
     *     ),
     * ),
     *
     */

    /**
     * @OA\Schema(
     *     schema="CpFailureResponse",
     *     title="Failure Response",
     *     description="Failure Response",
     *     @OA\Property(
     *         property="status",
     *         type="string",
     *         example="Failure"
     *     ),
     *     @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Error descriptions",
     *     ),
     * ),
     *
     */



    /**
     * Create new subscription or new donation through CloudPayment.
     *
     * @OA\Post(
     *     path="/pay/cp/create",
     *     operationId="createCloudPayment",
     *     tags={"Pay"},
     *     summary="Create new subscription or new donation through CloudPayment",
     *     description="Create new subscription or new donation through CloudPayment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateCloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/CpSuccessResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpRedirectResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpFailureResponse"),
     *             },
     *             examples={
     *                 "myname": @OA\Schema(ref="#/components/examples/CpSuccessResponseEcample", example="RequestExample"),
     *                 "myname2": @OA\Schema(ref="#/components/examples/CpRedirectResponseExample", example="RequestExample2"),
     *                 "myname3": @OA\Schema(ref="#/components/examples/CpFailureResponseExample", example="RequestExample3"),
     *             },
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
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function createCloudPayment(CreateCloudPaymentPayRequest $request, CreateCloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_CREATE);
        $dto = new CreateCloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update subscription through Cloud Payment.
     *
     * @OA\Post(
     *     path="/pay/cp/update",
     *     operationId="updateCloudPayment",
     *     tags={"Pay"},
     *     summary="Update subscription through Cloud Payment",
     *     description="Update subscription through Cloud Payment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/CpSuccessResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpRedirectResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpFailureResponse"),
     *             },
     *             examples={
     *                 "myname": @OA\Schema(ref="#/components/examples/CpSuccessResponseEcample", example="RequestExample"),
     *                 "myname2": @OA\Schema(ref="#/components/examples/CpRedirectResponseExample", example="RequestExample2"),
     *                 "myname3": @OA\Schema(ref="#/components/examples/CpFailureResponseExample", example="RequestExample3"),
     *             },
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
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function updateCloudPayment(UpdateCloudPaymentPayRequest $request, UpdateCloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_UPDATE);
        $dto = new UpdateCloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Deactivate subscription with Cloud Payment.
     *
     * @OA\Post(
     *     path="/pay/cp/deactivate",
     *     operationId="deactivateCloudPayment",
     *     tags={"Pay"},
     *     summary="Deactivate subscription with Cloud Payment",
     *     description="Deactivate subscription with Cloud Payment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DeactivateCloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/CpSuccessResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpFailureResponse"),
     *             },
     *             examples={
     *                 "myname": @OA\Schema(ref="#/components/examples/CpSuccessResponseEcample", example="RequestExample"),
     *                 "myname3": @OA\Schema(ref="#/components/examples/CpFailureResponseExample", example="RequestExample3"),
     *             },
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
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function deactivateCloudPayment(DeactivateCloudPaymentPayRequest $request, DeactivateCloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_DEACTIVATE);
        $dto = new DeactivateCloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update subscription commission through Cloud Payment.
     *
     * @OA\Post(
     *     path="/pay/cp/update_commission",
     *     operationId="updateCommissioncloudPayment",
     *     tags={"Pay"},
     *     summary="Update subscription commission through Cloud Payment",
     *     description="Update subscription commission through Cloud Payment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCommissionCloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/CpSuccessResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpFailureResponse"),
     *             },
     *             examples={
     *                 "myname": @OA\Schema(ref="#/components/examples/CpSuccessResponseEcample", example="RequestExample"),
     *                 "myname3": @OA\Schema(ref="#/components/examples/CpFailureResponseExample", example="RequestExample3"),
     *             },
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
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function updateCommissionCloudPayment(UpdateCommissionCloudPaymentPayRequest $request, UpdateCommissionCloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_UPDATE_COMMISSION);
        $dto = new UpdateCommissionCloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Restore subscription through Cloud Payment.
     *
     * @OA\Post(
     *     path="/pay/cp/restore",
     *     operationId="restoreCloudPayment",
     *     tags={"Pay"},
     *     summary="Restore subscription through Cloud Payment",
     *     description="Restore subscription through Cloud Payment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RestoreCloudPaymentPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/CpSuccessResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpRedirectResponse"),
     *                 @OA\Schema(ref="#/components/schemas/CpFailureResponse"),
     *             },
     *             examples={
     *                 "myname": @OA\Schema(ref="#/components/examples/CpSuccessResponseEcample", example="RequestExample"),
     *                 "myname2": @OA\Schema(ref="#/components/examples/CpRedirectResponseExample", example="RequestExample2"),
     *                 "myname3": @OA\Schema(ref="#/components/examples/CpFailureResponseExample", example="RequestExample3"),
     *             },
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
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function restoreCloudPayment(RestoreCloudPaymentPayRequest $request, RestoreCloudPaymentPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_RESTORE);
        $dto = new RestoreCloudPaymentPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Payment through CloudPayment with users Auth JWT-token.
     *
     * @OA\Post(
     *     path="/pay/cp/token",
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
     *                 property="status",
     *                 type="string",
     *                 example="Success"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="New transaction 1234"
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
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function cloudPaymentToken(CloudPaymentTokenPayRequest $request, CloudPaymentTokenPayAction $action)
    {
        $this->authorizeToken(self::PAY_CLOUD_PAYMENT_TOKEN);
        $requestArr = [];
        $requestArr = $request->validated();
        $requestArr['user_id'] = 0;
        $requestArr['email'] = '';
        $dto = new CloudPaymentTokenPayRequestDto($requestArr);
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
