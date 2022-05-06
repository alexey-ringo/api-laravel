<?php

namespace App\Domains\Edu\Tasks;

use App\Domains\Edu\Dto\Response\CourseEduResponseDataDto;
use App\Domains\Edu\Tasks\Base\AbstractCollectionEduTask;
use App\Parents\Tasks\AbstractTask;

class ListCourseEduTask extends AbstractCollectionEduTask
{
    protected string $apiPath = '/courses/get';
    protected string $responseDataDtoClassName = CourseEduResponseDataDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;
}
