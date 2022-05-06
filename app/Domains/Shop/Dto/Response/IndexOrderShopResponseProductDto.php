<?php

namespace App\Domains\Shop\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class IndexOrderShopResponseProductDto
 * @package App\Domains\Shop\Dto\Response
 *
 * @OA\Schema(
 *     title="IndexOrderShopResponseProductDto",
 *     description="IndexOrderShopResponseProductDto",
 *     @OA\Property(
 *         property="order_product_id",
 *         type="integer",
 *         example="3535",
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         example="50",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Тестовая книга -  Жизнь, которую вы можете спасти. Как покончить с бедностью во всем мире",
 *     ),
 *     @OA\Property(
 *         property="model",
 *         type="string",
 *         example="printbook",
 *     ),
 *     @OA\Property(
 *         property="size",
 *         type="string",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="download",
 *         type="string",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="number",
 *         format="float",
 *         example="284.00",
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         example="https://shop.takiedela.ru/image/cache/catalog/Pre/podmnogoletnim-120x120.jpg",
 *     ),
 *     @OA\Property(
 *         property="author",
 *         type="string",
 *         example="Валери Джилпир",
 *     ),
 *     @OA\Property(
 *         property="option",
 *         type="array",
 *         @OA\Items(
 *             @OA\Property(
 *                 property="order_option_id",
 *                 type="string",
 *                 example="1367",
 *             ),
 *             @OA\Property(
 *                 property="order_id",
 *                 type="string",
 *                 example="2014",
 *             ),
 *             @OA\Property(
 *                 property="order_product_id",
 *                 type="string",
 *                 example="3195",
 *             ),
 *             @OA\Property(
 *                 property="product_option_id",
 *                 type="string",
 *                 example="266",
 *             ),
 *             @OA\Property(
 *                 property="product_option_value_id",
 *                 type="string",
 *                 example="127",
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 example="Издание",
 *             ),
 *             @OA\Property(
 *                 property="value",
 *                 type="string",
 *                 example="Печатная книга",
 *             ),
 *             @OA\Property(
 *                 property="type",
 *                 type="string",
 *                 example="radio",
 *             ),
 *         ),
 *     ),
 * )
 */
class IndexOrderShopResponseProductDto extends DataTransferObject
{
    public int $order_product_id;
    public int $product_id;
    public string $name;
    public string $model;

    public string|null $size;
    public string|null $download;

//    public float $total;
    public string $total;
    public int $quantity;
    public string $image;
    public string|null $author;
    public array $option;
}
