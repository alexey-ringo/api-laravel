<?php

namespace App\Domains\Auth\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractAuthTask extends AbstractTask
{
    protected string $baseUri;

    /**
     * AbstractAuthTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.auth.staging.base_uri'),
            'local' => config('domains.auth.local.base_uri'),
            default => config('domains.auth.production.base_uri'),
        };
    }
}
