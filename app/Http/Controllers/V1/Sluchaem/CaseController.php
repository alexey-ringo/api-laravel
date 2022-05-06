<?php

namespace App\Http\Controllers\V1\Sluchaem;

use App\Domains\Sluchaem\Actions\CaseCollectionSluchaemAction;
use App\Domains\Sluchaem\Actions\CrowdfundingCollectionSluchaemAction;
use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Sluchaem\CollectionSluchaemRequest;
use App\Http\Resources\DefaultResource;

class CaseController extends Controller
{
    const ACTIVE_CASES = 'sluchaem-active_cases';
    const SHOW_CASE = 'sluchaem-show_case';

    /**
     * @OA\Get(
     *     path="/sluchaem/cases",
     *     tags={"Sluchaem"},
     *     summary="Get Cases from Sluchaem.",
     *     description="Returns Cases data",
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
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CaseCollectionSluchaemResponseDto")
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
    public function indexCases(CollectionSluchaemRequest $request, CaseCollectionSluchaemAction $action)
    {
        $this->authorizeToken(self::SLUCHAEM_CASE_INDEX_CASES);
        $dto = new CollectionSluchaemRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * @OA\Get(
     *     path="/sluchaem/crowdfunding",
     *     tags={"Sluchaem"},
     *     summary="Get Crowdfunding collection from Sluchaem",
     *     description="Get Crowdfunding collection from Sluchaem",
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
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CrowdfundingCollectionSluchaemResponseDto")
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
    public function indexCrowdfunding(CollectionSluchaemRequest $request, CrowdfundingCollectionSluchaemAction $action)
    {
        $this->authorizeToken(self::SLUCHAEM_CASE_INDEX_CROWDFUNDING);
        $dto = new CollectionSluchaemRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
