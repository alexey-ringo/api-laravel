<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Dto\Request\SearchOrganizationsTochnostRequestDto;
use App\Domains\Tochnost\Tasks\ClientsSearchOrganizationsTochnostTask;
use App\Domains\Tochnost\Tasks\SearchOrganizationsBotTochnostTask;
use App\Domains\Tochnost\Tasks\SearchOrganizationsTochnostTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class SearchOrganizationsTochnostAction
{
    const BOT_TYPE = 'bot';
    const CLIENTS_TYPE = 'clients';

    private SearchOrganizationsTochnostTask $searchTochnostTask;

    private SearchOrganizationsBotTochnostTask $searchBotTochnostTask;

    /**
     * SearchOrganizationsTochnostAction constructor.
     * @param SearchOrganizationsTochnostTask $searchTochnostTask
     * @param SearchOrganizationsBotTochnostTask $searchBotTochnostTask
     */
    public function __construct(
        SearchOrganizationsTochnostTask        $searchTochnostTask,
        SearchOrganizationsBotTochnostTask     $searchBotTochnostTask
    ) {
        $this->searchTochnostTask = $searchTochnostTask;
        $this->searchBotTochnostTask = $searchBotTochnostTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(SearchOrganizationsTochnostRequestDto $dto): ResourceResponseDto
    {
        if (isset($dto->type) && $dto->type === self::BOT_TYPE) {
            return $this->searchBotTochnostTask->run($dto);
        }
        return $this->searchTochnostTask->run($dto);
    }
}
