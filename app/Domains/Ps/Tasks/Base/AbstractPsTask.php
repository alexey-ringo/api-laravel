<?php

namespace App\Domains\Ps\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractPsTask extends AbstractTask
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
            'staging' => config('domains.ps.staging.base_uri'),
            'local' => config('domains.ps.staging.base_uri'),
            default => config('domains.ps.production.base_uri'),
        };
    }
}
