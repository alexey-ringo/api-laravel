<?php

namespace App\Domains\Shop\Actions;

use App\Domains\Shop\Dto\Request\IndexOrderShopRequestDto;
use App\Domains\Shop\Dto\Response\IndexOrderShopResourceCollectionDto;
use App\Domains\Shop\Tasks\IndexOrderShopTask;

/**
 * Class UserOrderShopAction
 * @package App\Domains\Shop\Actions
 */
class UserOrderShopAction
{
    /**
     * @param IndexOrderShopRequestDto $dto
     * @param int $id
     * @return IndexOrderShopResourceCollectionDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(IndexOrderShopRequestDto $dto, int $id): IndexOrderShopResourceCollectionDto
    {
        $indexOrderShopTask = new IndexOrderShopTask($id);

        return $indexOrderShopTask->run($dto);
    }
}
