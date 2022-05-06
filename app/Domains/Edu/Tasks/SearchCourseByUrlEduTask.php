<?php

namespace App\Domains\Edu\Tasks;

use App\Domains\Edu\Dto\Response\CourseLandingEduResponseDataDto;
use App\Domains\Edu\Tasks\Base\AbstractResourceEduTask;
use App\Parents\Tasks\AbstractTask;

class SearchCourseByUrlEduTask extends AbstractResourceEduTask
{
    protected string $contentArrayName = 'data';
    protected array $addParams = [
        'status' => 'status'
    ];
    protected string $apiPath = '/v1/courses/searchByUrl';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDataDtoClassName = CourseLandingEduResponseDataDto::class;
}
