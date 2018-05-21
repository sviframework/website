<?php

namespace User;

use User\Manager\UserManager;
use User\Service\UserService;

class Bundle extends \Svi\Service\BundlesService\Bundle
{

    public function getRoutes()
    {
        return [
            'Login'   => [
                '_login' => '/login:index',
            ],
            'Restore' => [
                '_restore1' => '/restore/1:step1',
                '_restore2' => '/restore/2/{hash}:step2',
            ],
        ];
    }

    protected function getServices()
    {
        return [
            UserManager::class,
            UserService::class,
        ];
    }

}