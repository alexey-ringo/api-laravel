<?php

namespace App\Http\Controllers\V1\Tochnost;

use App\Domains\Tochnost\Actions\ListCategoryTochnostAction;
use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Resources\DefaultResource;

class ListController extends Controller
{
    const LIST_CATEGORY = 'tochnost-list-category';

    /**
     * Show organization by INN from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/lists/category",
     *     operationId="listCategory",
     *     tags={"Tochnost"},
     *     summary="Category List from Tochnost Service",
     *     description="Category List from Tochnost Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/ListCategoryTochnostResponseDto"
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
     * @throws ApiLogicalException
     */
    public function listCategory(ListCategoryTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_LIST_LIST_CATEGORY);
        $emptyRequestDto = new BaseTochnostRequestDto();
        $resourceCollectionDto = $action->run($emptyRequestDto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }
}
