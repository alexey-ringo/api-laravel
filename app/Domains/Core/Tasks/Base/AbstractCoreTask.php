<?php

namespace App\Domains\Core\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractCoreTask extends AbstractTask
{
    protected string $baseUri;
    protected string $bearerToken;

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
            'staging' => config('domains.core.staging.base_uri'),
            'local' => config('domains.core.staging.base_uri'),
            default => config('domains.core.production.base_uri'),
        };
        $this->bearerToken = match (app()->environment()) {
            'staging' => config('domains.core.staging.bearer_token'),
            'local' => config('domains.core.staging.bearer_token'),
            default => config('domains.core.production.bearer_token'),
        };
    }
}
