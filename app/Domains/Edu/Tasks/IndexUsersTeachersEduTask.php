<?php

namespace App\Domains\Edu\Tasks;

use App\Domains\Edu\Dto\Response\UsersTeachersEduResponseDataDto;
use App\Domains\Edu\Tasks\Base\AbstractCollectionEduTask;
use App\Parents\Tasks\AbstractTask;

class IndexUsersTeachersEduTask extends AbstractCollectionEduTask
{
    protected string $contentArrayName = 'data';
    protected string $subContentArrayName = 'users';
    protected array $addParams = [
        'status' => 'status',
        'data' => [
            'total' => 'total',
            'users' => 'users'
        ],
    ];
    protected string $apiPath = '/v1/users/teachers';
    protected string $responseDataDtoClassName = UsersTeachersEduResponseDataDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;
}
