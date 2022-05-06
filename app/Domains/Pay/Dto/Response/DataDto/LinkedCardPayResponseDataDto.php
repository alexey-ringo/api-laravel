<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class LinkedCardsPayResponseDataDto
 * @package App\Domains\Pay\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="LinkedCardsPayResponseDataDto",
 *     description="Linked Cards Response Data",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="201256",
 *     ),
 *     @OA\Property(
 *         property="cardnumber",
 *         type="string",
 *         example="426101****9039",
 *     ),
 *     @OA\Property(
 *         property="cardtype",
 *         type="string",
 *         example="Visa",
 *     ),
 *     @OA\Property(
 *         property="is_maincard",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="finish_m",
 *         type="integer",
 *         example="9",
 *     ),
 *     @OA\Property(
 *         property="finish_y",
 *         type="integer",
 *         example="22",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="cp",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="delete",
 *     ),
 *     @OA\Xml(
 *         name="LinkedCardsPayResponseDataDto"
 *     )
 * )
 *
 */
class LinkedCardPayResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $cardnumber;
    public string $cardtype;
    public bool $is_maincard;
    public int $finish_m;
    public int $finish_y;
    public string $provider;
    public string $status;
}
