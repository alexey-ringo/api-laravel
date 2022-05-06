<?php

namespace App\Domains\Pay\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractPayTask extends AbstractTask
{
    protected string $baseUri;
    protected string $username;
    protected string $password;

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
            'staging' => config('domains.pay.staging.base_uri'),
            'local' => config('domains.pay.staging.base_uri'),
            default => config('domains.pay.production.base_uri'),
        };
        $this->username = match (app()->environment()) {
            'staging' => config('domains.pay.staging.base_auth_username'),
            'local' => config('domains.pay.staging.base_auth_username'),
            default => config('domains.pay.production.base_auth_username'),
        };
        $this->password = match (app()->environment()) {
            'staging' => config('domains.pay.staging.base_auth_password'),
            'local' => config('domains.pay.staging.base_auth_password'),
            default => config('domains.pay.production.base_auth_password'),
        };
    }
}
