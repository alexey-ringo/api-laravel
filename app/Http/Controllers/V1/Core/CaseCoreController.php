<?php

namespace App\Http\Controllers\V1\Core;

use App\Domains\Core\Actions\IndexCaseCoreAction;
use App\Domains\Core\Actions\ShowCaseCoreAction;
use App\Domains\Core\Dto\Request\IndexCaseCoreRequestDto;
use App\Domains\Core\Dto\Request\ShowCaseCoreRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Core\IndexCaseCoreRequest;
use App\Http\Requests\Core\ShowCaseCoreRequest;
use App\Http\Resources\NoWrapResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CaseCoreController extends Controller
{
    /**
     * Get Case collection from Core.
     *
     * @OA\Get(
     *     path="/core/cases",
     *     operationId="indexCases",
     *     tags={"Core-Funds-Cases"},
     *     summary="Get Case collection from Core",
     *     description="Get Case collection from Core",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="fields",
     *          description="Поля, получаемые из БД",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="extra_fields",
     *          description="Дополнительные поля",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="filter",
     *          description="Значения для поиска. Формат: поле:значение:оператор",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="sort",
     *          description="Значение для сортировки (если передается со знаком -, то обратная сортировка)",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="limit",
     *          description="Количество возвращаемых записей",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="offset",
     *          description="Смещение",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="paginate",
     *          description="Пагинация (количество элементов на странице)",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="page",
     *          description="page",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CaseCollectionCoreResponseDto"),
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
    public function index(IndexCaseCoreRequest $request, IndexCaseCoreAction $action)
    {
        $this->authorizeToken(self::CORE_CASE_INDEX);
        $dto = new IndexCaseCoreRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show Case from Core.
     *
     * @OA\Get(
     *     path="/core/cases/{uuid}",
     *     operationId="showCase",
     *     tags={"Core-Funds-Cases"},
     *     summary="Show Case from Core",
     *     description="Show Case from Core",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="fields",
     *          description="Поля, получаемые из БД",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="extra_fields",
     *          description="Дополнительные поля",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/CaseCoreResponseDto"),
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
    public function show(ShowCaseCoreRequest $request, string $uuid, ShowCaseCoreAction $action)
    {
        $this->authorizeToken(self::CORE_CASE_SHOW);
        $dto = new ShowCaseCoreRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
