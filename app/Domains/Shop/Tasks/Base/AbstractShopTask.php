<?php

namespace App\Domains\Shop\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractShopTask extends AbstractTask
{
    protected string $baseUri;
    protected string $token;

    /**
     * AbstractShopTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.shop.staging.base_uri'),
            'local' => config('domains.shop.staging.base_uri'),
            default => config('domains.shop.production.base_uri'),
        };
        $this->token = match (app()->environment()) {
            'staging' => config('domains.shop.staging.token'),
            'local' => config('domains.shop.staging.token'),
            default => config('domains.shop.production.token'),
        };
    }
}
