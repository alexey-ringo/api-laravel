<?php

namespace App\Domains\Sluchaem\Dto;

use App\Parents\Dto\Response\Pagination\MetadataCollectionResponseDto;

/**
 * Class CaseCollectionSluchaemResponseDto
 * @package App\Domains\Sluchaem\Dto
 *
 * @OA\Schema(
 *     title="CaseCollectionSluchaemResponseDto",
 *     description="Cases Data Response with Meta and Links",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CaseCollectionSluchaemResponseDataDto"),
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
class CaseCollectionSluchaemResponseDto extends MetadataCollectionResponseDto
{

}
