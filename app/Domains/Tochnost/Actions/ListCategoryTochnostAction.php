<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Domains\Tochnost\Tasks\ListCategoryTochnostTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

class ListCategoryTochnostAction
{
    /**
     * @var ListCategoryTochnostTask
     */
    private ListCategoryTochnostTask $listCategoryTochnostTask;

    /**
     * ListCategoryTochnostTask constructor.
     * @param ListCategoryTochnostTask $listCategoryTochnostTask
     */
    public function __construct(ListCategoryTochnostTask $listCategoryTochnostTask)
    {
        $this->listCategoryTochnostTask = $listCategoryTochnostTask;
    }

    public function run(BaseTochnostRequestDto $dto): ResourceCollectionDto
    {
        return $this->listCategoryTochnostTask->run($dto);
    }
}
