<?php

namespace Admin\Controller;

use User\Service\UserService;

trait AdminControllerTrait
{

    protected function getTemplateParameters(array $parameters = [])
    {
        $menu = [
            [
                'title' => 'Настройки',
                'items' => [
                    ['title' => 'Меню', 'url' => $this->getRoutingService()->getUrl('_admin_menu')],
                ],
            ],
        ];

        return parent::getTemplateParameters(array_merge([
            'alerts'       => $this->getAlertsService()->getAlerts(),
            'currentUser'  => $this->app[UserService::class]->getCurrentUser(),
            'currentAdmin' => $this->app[UserService::class]->getCurrentUser(),
            'menu'         => $menu,
        ], $parameters));
    }

}