<?php

namespace App\Domains\Ps\Tasks;

use App\Domains\Ps\Dto\Response\EventPsResponseDataDto;
use App\Domains\Ps\Tasks\Base\AbstractCollectionPsTask;
use App\Parents\Tasks\AbstractTask;

class ShowUserIdEventPsTask extends AbstractCollectionPsTask
{
    protected string $contentArrayName = 'data';
    protected array $addParams = [
        'count' => 'count'
    ];
    protected string $responseDataDtoClassName = EventPsResponseDataDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->apiPath = '/events/getByUser/' . $id;
    }
}
