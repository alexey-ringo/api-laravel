<?php

namespace App\Domains\Crm\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractCrmTask extends AbstractTask
{
    protected string $baseUri;

    /**
     * AbstractCrmTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.crm.staging.base_uri'),
            'local' => config('domains.crm.staging.base_uri'),
            default => config('domains.crm.production.base_uri'),
        };
    }
}
