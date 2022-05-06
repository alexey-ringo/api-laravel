<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OfficeMatchingCampaignSignupDonationsDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="OfficeMatchingCampaignSignupDonationsDto",
 *     description="OfficeMatchingCampaignSignupDonationsDto",
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
 * )
 *
 */
class MatchingCampaignSignupDonationsDto extends DataTransferObject
{
    public string $count;
    public string $sum;
// TODO: Why can't I call Constructor here?????????
//    public function __construct(array $data)
//    {
//        if (isset($data['count'])) {
//            $data['count'] = (int) $data['count'];
//        }
//        parent::__construct($data);
//    }
}
