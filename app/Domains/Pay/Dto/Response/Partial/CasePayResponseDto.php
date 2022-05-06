<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CasePayResponseDto
 * @package App\Domains\Pay\Dto\Response\Partial
 */
class CasePayResponseDto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $img;
    public string $desc;
    public string $url;
    public bool $removed;
}
