<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CounterpartyCrmResponseDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="Counterparty Response Data",
 *     description="Counterparty Response Data",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="d9920b5f-4053-48ec-8144-d377ddffbcf1",
 *     ),
 *     @OA\Property(
 *         property="model_type",
 *         type="string",
 *         example="user",
 *     ),
 *     @OA\Property(
 *         property="model_id",
 *         type="integer",
 *         example="123",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2021-07-19T13:32:40.000000Z",
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         example="2021-07-19T13:32:40.000000Z",
 *     ),
 * )
 *
 */
class CounterpartyCrmResponseDataDto extends DataTransferObject
{
    public string $id;
    public string $model_type;
    public int $model_id;
    public string $created_at;
    public string $updated_at;
}
