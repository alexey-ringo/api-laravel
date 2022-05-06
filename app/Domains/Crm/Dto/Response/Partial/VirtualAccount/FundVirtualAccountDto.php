<?php

namespace App\Domains\Crm\Dto\Response\Partial\VirtualAccount;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FundVirtualAccountDto
 * @package App\Domains\Crm\Dto\Response\Partial\VirtualAccount
 *
 * @OA\Schema(
 *     title="FundVirtualAccountDto for StoreVirtualAccountResponse",
 *     description="FundVirtualAccountDto for StoreVirtualAccountResponse",
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
 *         property="url",
 *         type="string",
 *         example="http://www.advita.ru/",
 *     ),
 *     @OA\Property(
 *         property="full_name",
 *         type="string",
 *         example="НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ БЛАГОТВОРИТЕЛЬНЫЙ ФОНД АДВИТА",
 *     ),
 * )
 *
 */
class FundVirtualAccountDto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $url;
    public string $full_name;
}
