<?php

namespace App\Http\Controllers\V1\Sluchaem;

use App\Domains\Sluchaem\Actions\FundCollectionSluchaemAction;
use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Domains\Sluchaem\Tasks\FundUnlimitedCollectionSluchaemTask;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Sluchaem\CollectionSluchaemRequest;
use App\Http\Resources\DefaultResource;

class FundController extends Controller
{
    const FUNDS = 'sluchaem-index_funds';
    const ALL_FUNDS = 'sluchaem-index_all_funds';

    /**
     * @OA\Get(
     *     path="/sluchaem/funds",
     *     tags={"Sluchaem"},
     *     summary="Get all Funds from Sluchaem.",
     *     description="Returns Funds data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="order",
     *         description="sorting type",
     *         in="query",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="category",
     *         description="category",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items()
     *         ),
     *     ),
     *     @OA\Parameter(
     *         name="inn",
     *         description="search funds by INN",
     *         in="query",
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items()
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/FundCollectionSluchaemResponseDto")
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
    public function indexFunds(CollectionSluchaemRequest $request, FundCollectionSluchaemAction $action)
    {
        $this->authorizeToken(self::FUNDS);
        $dto = new CollectionSluchaemRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/sluchaem/all-funds",
     *     tags={"Sluchaem"},
     *     summary="Get all Funds from Sluchaem.",
     *     description="Returns Funds data",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/FundCollectionSluchaemResponseDto")
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
    public function indexAllFunds(FundUnlimitedCollectionSluchaemTask $action)
    {
        $this->authorizeToken(self::ALL_FUNDS);
        $resourceResponseDto = $action->run();

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
