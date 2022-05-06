<?php

namespace App\Domains\Takiedela\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class GetDonateReportsTakiedelaResponseDataDto
 * @package App\Domains\Takiedela\Dto\Response
 *
 * @OA\Schema(
 *     title="GetDonateReportsTakiedelaResponseDataDto",
 *     description="GetDonateReportsTakiedelaResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="post_date",
 *         type="string",
 *         example="2021-08-28 13:41:30",
 *     ),
 *     @OA\Property(
 *         property="post_title",
 *         type="string",
 *         example="Фонд Чижовой. Выездная детская паллиативная служба Чувашии_август 2021",
 *     ),
 *     @OA\Property(
 *         property="meta_value",
 *         type="integer",
 *         example="401",
 *     ),
 * )
 */
class GetDonateReportsTakiedelaResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $post_date;
    public string $post_title;
    public int $meta_value;

    public function __construct(array $data)
    {
        if (isset($data['ID'])) {
            $data['id'] = (int) $data['ID'];
        }
        if (isset($data['meta_value'])) {
            $data['meta_value'] = (int) $data['meta_value'];
        }
        parent::__construct($data);
    }
}
