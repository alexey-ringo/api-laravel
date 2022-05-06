<?php

namespace App\Domains\Shop\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;
use Illuminate\Support\Collection;

/**
 * Class IndexOrderShopResponseDto
 * @package App\Domains\Shop\Dto\Response
 *
 * @OA\Schema(
 *     title="IndexOrderShopResponseDto",
 *     description="IndexOrderShopResponseDataDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/IndexOrderShopResponseDataDto",
 *     ),
 *     @OA\Property(
 *         property="products",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/IndexOrderShopResponseProductDto"),
 *     ),
 * )
 *
 */
class IndexOrderShopResponseDto extends DataTransferObject
{
    public IndexOrderShopResponseDataDto $data;
    public Collection $products;
}
