<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Domains\Crm\Dto\Response\Partial\VirtualAccount\CaseVirtualAccountDto;
use App\Domains\Crm\Dto\Response\Partial\VirtualAccount\FundVirtualAccountDto;
use App\Domains\Crm\Dto\Response\Partial\VirtualAccount\TypeVirtualAccountDto;
use App\Domains\Crm\Dto\Response\Partial\VirtualAccount\SubtypeVirtualAccountDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class StoreVirtualAccountCrmResponseDataDto
 * @package App\Domains\Crm\Dto
 *
 * @OA\Schema(
 *     title="StoreVirtualAccountCrmResponseDataDto",
 *     description="StoreVirtualAccountCrmResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="d9920b5f-4053-48ec-8144-d377ddffbcf1",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="object",
 *         ref="#/components/schemas/TypeVirtualAccountDto",
 *     ),
 *     @OA\Property(
 *         property="subtype",
 *         type="object",
 *         ref="#/components/schemas/SubtypeVirtualAccountDto",
 *     ),
 *     @OA\Property(
 *         property="case",
 *         type="object",
 *         ref="#/components/schemas/CaseVirtualAccountDto",
 *     ),
 *     @OA\Property(
 *         property="fund",
 *         type="object",
 *         ref="#/components/schemas/FundVirtualAccountDto",
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
class StoreVirtualAccountCrmResponseDataDto extends DataTransferObject
{
    public string $id;
    public TypeVirtualAccountDto $type;
    public SubtypeVirtualAccountDto $subtype;
    public CaseVirtualAccountDto|null $case;
    public FundVirtualAccountDto $fund;
    public string $created_at;
    public string $updated_at;
}
