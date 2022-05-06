<?php

namespace App\Http\Controllers\V1\Core;

use App\Domains\Core\Actions\IndexFundCoreAction;
use App\Domains\Core\Actions\ShowFundCoreAction;
use App\Domains\Core\Dto\Request\IndexFundCoreRequestDto;
use App\Domains\Core\Dto\Request\ShowFundCoreRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Core\IndexFundCoreRequest;
use App\Http\Requests\Core\ShowFundCoreRequest;
use App\Http\Resources\NoWrapResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FundCoreController extends Controller
{
    /**
     * Get Funds collection from Core.
     *
     * @OA\Get(
     *     path="/core/funds",
     *     operationId="indexFunds",
     *     tags={"Core-Funds-Cases"},
     *     summary="Get Fund collection from Core",
     *     description="Get Fund collection from Core",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="fields",
     *          description="Основные поля, получаемые из БД (по умолчанию - все основные поля)",
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
     *          description="Значение для сортировки",
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
     *          description="Пагинация",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="page",
     *          description="Номер страницы при пагинации",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/FundCollectionCoreResponseDto"),
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
    public function index(IndexFundCoreRequest $request, IndexFundCoreAction $action)
    {
        $this->authorizeToken(self::CORE_FUND_INDEX);
        $dto = new IndexFundCoreRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show Fund from Core.
     *
     * @OA\Get(
     *     path="/core/funds/{uuid}",
     *     operationId="showFund",
     *     tags={"Core-Funds-Cases"},
     *     summary="Show Fund from Core",
     *     description="Show Fund from Core",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="fields",
     *          description="fields",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="extra_fields",
     *          description="extra_fields",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/FundCoreResponseDto"),
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
    public function show(ShowFundCoreRequest $request, string $uuid, ShowFundCoreAction $action)
    {
        $this->authorizeToken(self::CORE_FUND_SHOW);
        $dto = new ShowFundCoreRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
