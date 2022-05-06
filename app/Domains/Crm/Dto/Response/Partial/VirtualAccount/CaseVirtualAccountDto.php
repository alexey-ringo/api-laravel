<?php

namespace App\Domains\Crm\Dto\Response\Partial\VirtualAccount;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CaseVirtualAccountDto
 * @package App\Domains\Crm\Dto\Response\Partial\VirtualAccount
 *
 * @OA\Schema(
 *     title="CaseVirtualAccountDto for StoreVirtualAccountResponse",
 *     description="CaseVirtualAccountDto for StoreVirtualAccountResponse",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="АдВита",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2021-07-19T13:32:40.000000Z",
 *     ),
 *     @OA\Property(
 *         property="closed_at",
 *         type="string",
 *         example="2021-07-19T13:32:40.000000Z",
 *     ), *
 * )
 *
 */
class CaseVirtualAccountDto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $created_at;
    public string|null $closed_at;
}
