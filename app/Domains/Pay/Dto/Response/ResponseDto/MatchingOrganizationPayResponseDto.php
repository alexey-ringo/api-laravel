<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Cast\MatchingOrganizationPayResponseCaster;
use App\Domains\Pay\Dto\Response\DataDto\MatchingOrganizationPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class MatchingOrganizationPayResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="MatchingOrganizationPayResponseDto",
 *     description="MatchingOrganizationPayResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Cards list empty",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/MatchingOrganizationPayResponseDataDto"),
 *     ),
 * )
 *
 */
class MatchingOrganizationPayResponseDto extends DataTransferObject
{
    public string $status;
    public string|null $message;

    #[CastWith(MatchingOrganizationPayResponseCaster::class)]
    public MatchingOrganizationPayResponseDataDto|null $data;

    public function __construct(array $data)
    {
        if (isset($data['message']) && is_array($data['message'])) {
            $data['data'] = $data['message'];
            $data['message'] = null;
        }
        parent::__construct($data);
    }
}
