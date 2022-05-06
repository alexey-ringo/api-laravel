<?php

namespace App\Domains\Shop\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;
use Illuminate\Support\Collection;

/**
 * Class IndexOrderShopResourceCollectionDto
 * @package App\Parents\Dto\Response
 */
class IndexOrderShopResourceCollectionDto extends DataTransferObject
{
    /**
     * @var int
     */
    public int $statusCode;

    /**
     * @var int
     */
    public int $count;

    /**
     * @var string
     */
    public string $success;

    /**
     * @var Collection
     */
    public Collection $collectionDto;
}
