<?php

namespace App\Domains\Crm\Dto\Response\Partial\VirtualAccount;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class TypeVirtualAccountDto
 * @package App\Domains\Crm\Dto\Response\Partial\VirtualAccount
 *
 * @OA\Schema(
 *     title="TypeVirtualAccountDto for StoreVirtualAccountResponse",
 *     description="TypeVirtualAccountDto for StoreVirtualAccountResponse",
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
class TypeVirtualAccountDto extends DataTransferObject
{
    public int $id;
    public string $name;
}
