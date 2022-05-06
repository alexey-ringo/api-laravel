<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\Actions\FetchOrRegAuthAction;
use App\Domains\Auth\Dto\FetchOrRegAuthRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Auth\FetchOrRegAuthRequest;
use App\Http\Resources\DefaultResource;

class SimplifiedUserController extends Controller
{
    const FETCH_OR_REG_USER = 'auth-fetch_or_reg_user';

    /**
     * @OA\Post(
     *     path="/auth/fetch-reg",
     *     tags={"Bot"},
     *     summary="Fetch Or Registration new User on Auth servise",
     *     description="Fetch Or Registration new User on Auth servise",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FetchOrRegAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthResponseDto"),
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
    public function fetchOrReg(FetchOrRegAuthRequest $request, FetchOrRegAuthAction $action)
    {
        $this->authorizeToken(self::FETCH_OR_REG_USER);
        $dto = new FetchOrRegAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
