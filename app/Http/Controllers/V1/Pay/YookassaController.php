<?php

namespace App\Http\Controllers\V1\Pay;

use App\Domains\Pay\Actions\DeleteYookassaPayAction;
use App\Domains\Pay\Actions\RestoreYookassaPayAction;
use App\Domains\Pay\Actions\UpdateYookassaPayAction;
use App\Domains\Pay\Actions\YookassaPayAction;
use App\Domains\Pay\Dto\Request\DeleteYookassaPayRequestDto;
use App\Domains\Pay\Dto\Request\RequestYookassaPayRequestDto;
use App\Domains\Pay\Dto\Request\UpdateYookassaPayRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Pay\DeleteYookassaPayRequest;
use App\Http\Requests\Pay\UpdateYookassaPayRequest;
use App\Http\Requests\Pay\YookassaPayRequest;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class YookassaController extends Controller
{
    /**
     * Create new subscription or new donation through CloudPayment.
     *
     * @OA\Post(
     *     path="/pay/yookassa/create",
     *     operationId="createYookassa",
     *     tags={"Pay"},
     *     summary="Create new subscription or new donation through CloudPayment",
     *     description="Create new subscription or new donation through CloudPayment",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/YookassaPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/YookassaPayResponseDto"),
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
    public function create(YookassaPayRequest $request, YookassaPayAction $action)
    {
        $this->authorizeToken(self::PAY_YOOKASSA_CREATE_YOOKASSA);
        $dto = new RequestYookassaPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update subscription through Yookassa.
     *
     * @OA\Post(
     *     path="/pay/yookassa/update",
     *     operationId="updateYookassaSubscription",
     *     tags={"Pay"},
     *     summary="Update subscription through Yookassa",
     *     description="Update subscription through Yookassa",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateYookassaPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/YookassaPayResponseDto"),
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
    public function update(UpdateYookassaPayRequest $request, UpdateYookassaPayAction $action)
    {
        $this->authorizeToken(self::PAY_YOOKASSA_UPDATE_YOOKASSA);
        $dto = new UpdateYookassaPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Deactivate subscription through Yookassa.
     *
     * @OA\Post(
     *     path="/pay/yookassa/deactivate",
     *     operationId="deactivateYookassaSubscription",
     *     tags={"Pay"},
     *     summary="Deactivate subscription through Yookassa",
     *     description="Deactivate subscription through Yookassa",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DeleteYookassaPayRequest")
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
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
    public function deactivate(DeleteYookassaPayRequest $request, DeleteYookassaPayAction $action)
    {
        $this->authorizeToken(self::PAY_YOOKASSA_DELETE_YOOKASSA);
        $dto = new DeleteYookassaPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Restore subscription through Yookassa.
     *
     * @OA\Post(
     *     path="/pay/yookassa/restore",
     *     operationId="restoreYookassaSubscription",
     *     tags={"Pay"},
     *     summary="Restore subscription through Yookassa",
     *     description="Restore subscription through Yookassa",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateYookassaPayRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/YookassaPayResponseDto"),
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
    public function restore(UpdateYookassaPayRequest $request, RestoreYookassaPayAction $action)
    {
        $this->authorizeToken(self::PAY_YOOKASSA_RESTORE_YOOKASSA);
        $dto = new UpdateYookassaPayRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
