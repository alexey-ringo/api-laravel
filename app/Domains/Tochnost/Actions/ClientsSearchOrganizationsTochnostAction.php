<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Dto\Request\ClientsSearchOrganizationsTochnostRequestDto;
use App\Domains\Tochnost\Tasks\ClientsSearchOrganizationsTochnostTask;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Validation\ValidationException;

class ClientsSearchOrganizationsTochnostAction
{
    const CLIENTS_TYPE = 'clients';

    private ClientsSearchOrganizationsTochnostTask $clientsSearchOrganizationsTochnostTask;

    /**
     * SearchOrganizationsTochnostAction constructor.
     * @param ClientsSearchOrganizationsTochnostTask $clientsSearchOrganizationsTochnostTask
     */
    public function __construct(ClientsSearchOrganizationsTochnostTask $clientsSearchOrganizationsTochnostTask)
    {
        $this->clientsSearchOrganizationsTochnostTask = $clientsSearchOrganizationsTochnostTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(ClientsSearchOrganizationsTochnostRequestDto $dto): ResourceCollectionDto
    {
        return $this->clientsSearchOrganizationsTochnostTask->run($dto);
    }
}
