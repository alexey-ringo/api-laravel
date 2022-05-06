<?php

namespace App\Domains\Comments\Dto\Response\CollectionDto;

use App\Domains\Comments\Dto\Response\DataDto\CommentCommentsResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class CommentCollectionCommentsResponseDto
 * @package App\Domains\Comments\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="CommentCollectionCommentsResponseDto",
 *     description="CommentCollectionCommentsResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CommentCommentsResponseDataDto"),
 *     ),
 * )
 *
 */
class CommentCollectionCommentsResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, CommentCommentsResponseDataDto::class)]
    public Collection $data;
}
