<?php

namespace App\Domains\Edu\Actions;

use App\Domains\Edu\Dto\Request\IndexUsersTeachersEduRequestDto;
use App\Domains\Edu\Tasks\IndexUsersTeachersEduTask;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Class IndexUsersTeachersEduAction
 * @package App\Domains\Edu\Actions
 */
class IndexUsersTeachersEduAction
{
    /**
     * @var IndexUsersTeachersEduTask
     */
    private IndexUsersTeachersEduTask $usersTeachersEduTask;

    /**
     * IndexUsersTeachersEduAction constructor.
     * @param IndexUsersTeachersEduTask $usersTeachersEduTask
     */
    public function __construct(IndexUsersTeachersEduTask $usersTeachersEduTask)
    {
        $this->usersTeachersEduTask = $usersTeachersEduTask;
    }

    /**
     * @param IndexUsersTeachersEduRequestDto $dto
     * @return ResourceCollectionDto
     * @throws UnknownProperties
     */
    public function run(IndexUsersTeachersEduRequestDto $dto): ResourceCollectionDto
    {
        return $this->usersTeachersEduTask->run($dto);
    }
}
