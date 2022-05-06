<?php

namespace App\Domains\Crm\Dto\Response\Partial\VirtualAccount;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubtypeVirtualAccountDto
 * @package App\Domains\Crm\Dto\Response\Partial\VirtualAccount
 *
 * @OA\Schema(
 *     title="SubtypeVirtualAccountDto for StoreVirtualAccountResponse",
 *     description="SubtypeVirtualAccountDto for StoreVirtualAccountResponse",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Доходы",
 *     ),
 * )
 *
 */
class SubtypeVirtualAccountDto extends DataTransferObject
{
    public int $id;
    public string $name;
}
