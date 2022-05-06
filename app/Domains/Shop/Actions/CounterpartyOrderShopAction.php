<?php

namespace App\Domains\Shop\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Dto\Response\DataDto\CounterpartyCrmResponseDataDto;
use App\Domains\Crm\Tasks\ShowCounterpartyCrmTask;
use App\Domains\Shop\Dto\Request\IndexOrderShopRequestDto;
use App\Domains\Shop\Dto\Response\IndexOrderShopResourceCollectionDto;
use App\Domains\Shop\Tasks\IndexOrderShopTask;
use Illuminate\Support\Facades\Cache;

/**
 * Class CounterpartyOrderShopAction
 * @package App\Domains\Shop\Actions
 */
class CounterpartyOrderShopAction
{
    /**
     * @param IndexOrderShopRequestDto $dto
     * @param string $uuid
     * @return IndexOrderShopResourceCollectionDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(IndexOrderShopRequestDto $dto, string $uuid): IndexOrderShopResourceCollectionDto
    {
        $counterpartyModelId = Cache::get($uuid);
        if (! isset($counterpartyModelId)) {
            $showCounterpartyCrmTask = new ShowCounterpartyCrmTask($uuid);
            $counterpartyRequestDto = new BaseCrmRequestDto;
            $counterpartyResponseDto = $showCounterpartyCrmTask->run($counterpartyRequestDto);
            /** @var CounterpartyCrmResponseDataDto $counterpartyDto */
            $counterpartyDto = $counterpartyResponseDto->responseDto;
            Cache::put($uuid, $counterpartyDto->model_id, now()->addHours(24));
            $indexOrderShopTask = new IndexOrderShopTask($counterpartyDto->model_id);

            return $indexOrderShopTask->run($dto);
        }
        $indexOrderShopTask = new IndexOrderShopTask($counterpartyModelId);

        return $indexOrderShopTask->run($dto);
    }
}
