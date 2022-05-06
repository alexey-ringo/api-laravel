<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\FilestorageCrmRequestDto;
use App\Domains\Crm\Tasks\FilestorageCrmTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

/**
 * Class FilestorageCrmAction
 * @package App\Domains\Crm\Actions
 */
class FilestorageCrmAction
{
    /**
     * @var FilestorageCrmTask
     */
    private FilestorageCrmTask $filestorageCrmTask;

    /**
     * FilestorageCrmAction constructor.
     * @param FilestorageCrmTask $filestorageCrmTask
     */
    public function __construct(FilestorageCrmTask $filestorageCrmTask)
    {
        $this->filestorageCrmTask = $filestorageCrmTask;
    }

    /**
     * @param FilestorageCrmRequestDto $dto
     * @return ResourceCollectionDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(FilestorageCrmRequestDto $dto): ResourceCollectionDto
    {
        return $this->filestorageCrmTask->run($dto);
    }
}
