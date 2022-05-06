<?php

namespace App\Domains\Edu\Actions;

use App\Domains\Edu\Dto\Request\ListCourseEduRequestDto;
use App\Domains\Edu\Tasks\ListCourseEduTask;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Class ListCourseEduAction
 * @package App\Domains\Edu\Actions
 */
class ListCourseEduAction
{
    /**
     * @var ListCourseEduTask
     */
    private ListCourseEduTask $listCourseEduTask;

    /**
     * StoreCounterpartyCrmAction constructor.
     * @param ListCourseEduTask $listCourseEduTask
     */
    public function __construct(ListCourseEduTask $listCourseEduTask)
    {
        $this->listCourseEduTask = $listCourseEduTask;
    }

    /**
     * @param ListCourseEduRequestDto $dto
     * @return ResourceCollectionDto
     * @throws UnknownProperties
     */
    public function run(ListCourseEduRequestDto $dto): ResourceCollectionDto
    {
        return $this->listCourseEduTask->run($dto);
    }
}
