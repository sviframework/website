<?php

namespace Promo;

use Promo\Manager\MenuManager;
use Promo\Service\MenuService;

class Bundle extends \Svi\Service\BundlesService\Bundle
{

    public function getRoutes()
    {
        return [
            'Front' => [
                '_front' => '/:index',
            ],
            'AdminMenu' => [
                '_admin_menu' => '/admin/menu:index',
                '_admin_menu_add' => '/admin/menu/add:add',
                '_admin_menu_edit' => '/admin/menu/edit/{id}:edit',
                '_admin_menu_delete' => '/admin/menu/delete/{id}:delete',
            ],
        ];
    }

    protected function getServices()
    {
        return [
            MenuManager::class,
            MenuService::class,
        ];
    }

}