<?php

namespace Promo;

use Promo\Manager\MenuManager;
use Promo\Service\MenuService;

trait BundleTrait
{

    /**
     * @return MenuManager
     */
    protected function getMenuManager()
    {
        return $this->app[MenuManager::class];
    }

    /**
     * @return MenuService
     */
    protected function getMenuService()
    {
        return $this->app[MenuService::class];
    }

}