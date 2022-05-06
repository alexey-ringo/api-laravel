<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OfficeMatchingCampaignOnceDonationsDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="OfficeMatchingCampaignOnceDonationsDto",
 *     description="OfficeMatchingCampaignOnceDonationsDto",
 *     @OA\Property(
 *         property="count",
 *         type="string",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="20000",
 *     ),
 *     @OA\Property(
 *         property="users",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class MatchingCampaignOnceDonationsDto extends DataTransferObject
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
