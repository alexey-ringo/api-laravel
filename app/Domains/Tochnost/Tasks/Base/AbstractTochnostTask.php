<?php

namespace App\Domains\Tochnost\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractTochnostTask extends AbstractTask
{
    const CONNECTION_TIMEOUT = 10;
    const TIMEOUT = 10;

    protected string $baseUri;
    protected string $token;

    /**
     * AbstractTochnostTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.tochnost.staging.base_uri'),
            'local' => config('domains.tochnost.staging.base_uri'),
            default => config('domains.tochnost.production.base_uri'),
        };
        $this->token = match (app()->environment()) {
            'staging' => config('domains.tochnost.staging.token'),
            'local' => config('domains.tochnost.staging.token'),
            default => config('domains.tochnost.production.token'),
        };
    }
}
