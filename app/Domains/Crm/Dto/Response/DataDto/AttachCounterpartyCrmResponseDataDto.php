<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class AttachCounterpartyCrmResponseDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="AttachCounterpartyCrmResponseDataDto",
 *     description="AttachCounterpartyCrmResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="7",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="object",
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             example="14957",
 *         ),
 *         @OA\Property(
 *             property="namespace",
 *             type="string",
 *             example="Planfix\\PlanfixProvider",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="counterparty",
 *         type="object",
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             example="D1E094BE-0746-4078-A3A8-CD304078B00F",
 *         ),
 *         @OA\Property(
 *             property="model_type",
 *             type="string",
 *             example="user",
 *         ),
 *         @OA\Property(
 *             property="model_id",
 *             type="integer",
 *             example="200567",
 *         ),
 *         @OA\Property(
 *             property="created_at",
 *             type="string",
 *             example="2021-09-01T14:00:01.000000Z",
 *         ),
 *         @OA\Property(
 *             property="updated_at",
 *             type="string",
 *             example="2021-09-01T14:00:01.000000Z",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(
 *             property="inn",
 *             type="string",
 *             example="123456789765",
 *         ),
 *         @OA\Property(
 *             property="phone",
 *             type="string",
 *             example="79996660000",
 *         ),
 *         @OA\Property(
 *             property="email",
 *             type="string",
 *             example="p.prokofyev_dev@nuzhnapomosh.ru",
 *         ),
 *         @OA\Property(
 *             property="company",
 *             type="string",
 *             example="АНО Портал Такие дела",
 *         ),
 *         @OA\Property(
 *             property="lastname",
 *             type="string",
 *             example="Прокофьев",
 *         ),
 *         @OA\Property(
 *             property="firstname",
 *             type="string",
 *             example="ПавелТест",
 *         ),
 *         @OA\Property(
 *             property="middlename",
 *             type="string",
 *             example="Сергеевич",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2022-02-04T06:41:35.000000Z",
 *     ),
 * )
 *
 */
class AttachCounterpartyCrmResponseDataDto extends DataTransferObject
{
    public int $id;
    public array $provider;
    public array|null $counterparty;
    public array|null $data;
    public string $created_at;
}
