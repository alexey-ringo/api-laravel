<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OfficeMatchingCampaignActiveSignupsDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="OfficeMatchingCampaignActiveSignupsDto",
 *     description="OfficeMatchingCampaignActiveSignupsDto",
 *     @OA\Property(
 *         property="count",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="20000",
 *     ),
 *     @OA\Property(
 *         property="users",
 *         type="integer",
 *         example="12",
 *     ),
 * )
 *
 */
class MatchingCampaignActiveSignupsDto extends DataTransferObject
{
    public string $count;
    public string $sum;
    public string $users;
// TODO: Why can't I call Constructor here?????????
//    public function __construct(array $data)
//    {
//        if (isset($data['count'])) {
//            $data['count'] = (int) $data['count'];
//        }
//
//        if (isset($data['users'])) {
//            $data['users'] = (int) $data['users'];
//        }
//        parent::__construct($data);
//    }
}
