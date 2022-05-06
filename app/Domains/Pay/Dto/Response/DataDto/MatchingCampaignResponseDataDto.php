<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Domains\Pay\Dto\Response\Partial\MatchingCampaignActiveSignupsDto;
use App\Domains\Pay\Dto\Response\Partial\MatchingCampaignCountsDto;
use App\Domains\Pay\Dto\Response\Partial\MatchingCampaignOnceDonationsDto;
use App\Domains\Pay\Dto\Response\Partial\MatchingCampaignSignupDonationsDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class MatchingCampaignResponseDataDto
 * @package App\Domains\Pay\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="MatchingCampaignResponseDataDto",
 *     description="MatchingCampaignResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Matching Campaign",
 *     ),
 *     @OA\Property(
 *         property="max_sum",
 *         type="string",
 *         example="120000",
 *     ),
 *     @OA\Property(
 *         property="target_sum",
 *         type="string",
 *         example="120000",
 *     ),
 *     @OA\Property(
 *         property="left_sum",
 *         type="string",
 *         example="120000",
 *     ),
 *     @OA\Property(
 *         property="progress",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="count_donation",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="average_donation",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="metrics",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="metrics_count",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="once_donations",
 *         type="object",
 *         ref="#/components/schemas/MatchingCampaignOnceDonationsDto",
 *     ),
 *     @OA\Property(
 *         property="signup_donations",
 *         type="object",
 *         ref="#/components/schemas/MatchingCampaignSignupDonationsDto",
 *     ),
 *     @OA\Property(
 *         property="active_signups",
 *         type="object",
 *         ref="#/components/schemas/MatchingCampaignActiveSignupsDto",
 *     ),
 *     @OA\Property(
 *         property="open_events",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="details_funds",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="all_cases",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="counts",
 *         type="object",
 *         ref="#/components/schemas/MatchingCampaignCountsDto",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Черновик",
 *     ),
 *     @OA\Property(
 *         property="status_class",
 *         type="string",
 *         example="draft",
 *     ),
 *     @OA\Property(
 *         property="start",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="stop",
 *         type="string",
 *         example="0",
 *     ),
 * )
 *
 */
class MatchingCampaignResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $max_sum;
    public string $target_sum;
    public string|null $left_sum;
    public string $progress;
    // TODO: need casting to int - dont work into children dto constr
//    public int $count_donation;
    public string $count_donation;
    public int $average_donation;
    public array $metrics;
    public int $metrics_count;
    public MatchingCampaignOnceDonationsDto $once_donations;
    public MatchingCampaignSignupDonationsDto $signup_donations;
    public MatchingCampaignActiveSignupsDto $active_signups;
//    public array $once_donations;
//    public array $signup_donations;
//    public array $active_signups;
    public int $open_events;
    public array $details_funds;
    public array $all_cases;
    public MatchingCampaignCountsDto $counts;
    public string $status;
    public string $status_class;
    public string $start;
    public string|null $stop;
//
//    public function __construct(array $data)
//    {
//        if (isset($data['count_donation'])) {
//            $data['count_donation'] = (int) $data['count_donation'];
//        }
//        parent::__construct($data);
//    }
}
