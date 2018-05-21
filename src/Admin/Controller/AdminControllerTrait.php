<?php

namespace Admin\Controller;

use User\Service\UserService;

trait AdminControllerTrait
{

    protected function getTemplateParameters(array $parameters = [])
    {
        return parent::getTemplateParameters(array_merge([
            'alerts' => $this->getAlertsService()->getAlerts(),
            'currentUser' => $this->app[UserService::class]->getCurrentUser(),
            'currentAdmin' => $this->app[UserService::class]->getCurrentUser(),
        ], $parameters));
    }

}