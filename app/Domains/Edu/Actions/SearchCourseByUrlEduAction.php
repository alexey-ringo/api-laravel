<?php

namespace App\Domains\Edu\Actions;

use App\Domains\Edu\Dto\Request\SearchCourseByUrlEduRequestDto;
use App\Domains\Edu\Tasks\SearchCourseByUrlEduTask;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiNotFoundException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Class IndexUsersTeachersEduAction
 * @package App\Domains\Edu\Actions
 */
class SearchCourseByUrlEduAction
{
    /**
     * @var SearchCourseByUrlEduTask
     */
    private SearchCourseByUrlEduTask $searchCourseByUrlEduTask;

    /**
     * SearchCourseByUrlEduAction constructor.
     * @param SearchCourseByUrlEduTask $searchCourseByUrlEduTask
     */
    public function __construct(SearchCourseByUrlEduTask $searchCourseByUrlEduTask)
    {
        $this->searchCourseByUrlEduTask = $searchCourseByUrlEduTask;
    }

    /**
     * @param SearchCourseByUrlEduRequestDto $dto
     * @return ResourceResponseDto
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ApiNotFoundException
     * @throws ValidationException
     */
    public function run(SearchCourseByUrlEduRequestDto $dto): ResourceResponseDto
    {
        return $this->searchCourseByUrlEduTask->run($dto);
    }
}
