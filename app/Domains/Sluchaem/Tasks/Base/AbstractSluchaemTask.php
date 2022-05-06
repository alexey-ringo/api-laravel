<?php

namespace App\Domains\Sluchaem\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractSluchaemTask extends AbstractTask
{
    protected string $baseUri;

    /**
     * AbstractSluchaemTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.sluchaem.staging.base_uri'),
            'local' => config('domains.sluchaem.staging.base_uri'),
            default => config('domains.sluchaem.production.base_uri'),
        };
        $this->username = match (app()->environment()) {
            'staging' => config('domains.sluchaem.staging.base_auth_username'),
            'local' => config('domains.sluchaem.staging.base_auth_username'),
            default => config('domains.sluchaem.production.base_auth_username'),
        };
        $this->password = match (app()->environment()) {
            'staging' => config('domains.sluchaem.staging.base_auth_password'),
            'local' => config('domains.sluchaem.staging.base_auth_password'),
            default => config('domains.sluchaem.production.base_auth_password'),
        };
    }
}
