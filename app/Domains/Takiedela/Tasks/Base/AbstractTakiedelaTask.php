<?php

namespace App\Domains\Takiedela\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractTakiedelaTask extends AbstractTask
{
    const CONNECTION_TIMEOUT = 10;
    const TIMEOUT = 10;

    protected string $baseUri;
    protected string $token;

    /**
     * AbstractTakiedelaTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.takiedela.staging.base_uri'),
            'local' => config('domains.takiedela.staging.base_uri'),
            default => config('domains.takiedela.production.base_uri'),
        };
        $this->token = match (app()->environment()) {
            'staging' => config('domains.takiedela.staging.token'),
            'local' => config('domains.takiedela.staging.token'),
            default => config('domains.takiedela.production.token'),
        };
    }
}
