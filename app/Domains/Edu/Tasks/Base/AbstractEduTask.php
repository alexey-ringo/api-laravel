<?php

namespace App\Domains\Edu\Tasks\Base;

use App\Parents\Tasks\AbstractTask;

abstract class AbstractEduTask extends AbstractTask
{
    protected string $baseUri;

    /**
     * AbstractEduTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.edu.staging.base_uri'),
            'local' => config('domains.edu.staging.base_uri'),
            default => config('domains.edu.production.base_uri'),
        };
    }
}
