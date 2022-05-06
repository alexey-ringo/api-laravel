<?php

namespace App\Domains\Takiedela\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class TopicsTakiedelaResponseDataDto
 * @package App\Domains\Takiedela\Dto\Response
 *
 * @OA\Schema(
 *     title="TopicsTakiedelaResponseDataDto",
 *     description="Cases ids and refs on it Response",
 *     @OA\Property(
 *         property="case_id",
 *         description="case id",
 *         type="integer",
 *         example=4,
 *     ),
 *     @OA\Property(
 *         property="url",
 *         description="ref on case",
 *         type="string",
 *         example="https://takiedela.ru/topics/online-education/",
 *     ),
 *     @OA\Xml(
 *         name="TopicsTakiedelaResponseDataDto"
 *     )
 * )
 *
 */
class TopicsTakiedelaResponseDataDto extends DataTransferObject
{
    public int $case_id;
    public string $url;
}
