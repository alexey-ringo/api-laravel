<?php

namespace App\Http\Controllers\V1\Crm;

use App\Domains\Crm\Actions\StoreVirtualAccountCrmAction;
use App\Domains\Crm\Dto\Request\StoreVirtualAccountCrmRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Crm\StoreVirtualAccountCrmRequest;
use App\Http\Resources\DefaultResource;

class VirtualAccountController extends Controller
{
    const VIRTUAL_ACCOUNT_STORE = 'crm-store-virtual_account';

    /**
     * @OA\Post(
     *     path="/crm/virtual-accounts",
     *     tags={"Crm"},
     *     summary="Store Virtual Account",
     *     description="Returns data",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreVirtualAccountCrmRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StoreVirtualAccountCrmResponseDto")
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
    public function store(StoreVirtualAccountCrmRequest $request, StoreVirtualAccountCrmAction $action)
    {
        $this->authorizeToken(self::VIRTUAL_ACCOUNT_STORE);
        $dto = new StoreVirtualAccountCrmRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
