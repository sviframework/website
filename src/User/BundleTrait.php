<?php

namespace User;

use User\Manager\UserManager;
use User\Service\UserService;

trait BundleTrait
{

    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        return $this->app[UserManager::class];
    }

    /**
     * @return UserService
     */
    protected function getUserService()
    {
        return $this->app[UserService::class];
    }

}