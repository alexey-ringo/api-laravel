<?php

namespace App\Domains\Sluchaem\Dto;

use App\Parents\Dto\Response\Pagination\MetadataCollectionResponseDto;

/**
 * Class CrowdfundingCollectionSluchaemResponseDto
 * @package App\Domains\Sluchaem\Dto
 *
 * @OA\Schema(
 *     title="СrowdfundingCollectionSluchaemResponseDto",
 *     description="Crowdfunding Data Response with Meta and Links",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CrowdfundingCollectionSluchaemResponseDataDto"),
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/ResponseLinksDto"),
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/ResponseMetaDto"),
 *     ),
 * )
 *
 */
class CrowdfundingCollectionSluchaemResponseDto extends MetadataCollectionResponseDto
{

}
