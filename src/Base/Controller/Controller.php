<?php

namespace Base\Controller;

class Controller extends \Svi\HttpBundle\Controller\Controller
{

    protected function getTemplateParameters(array $parameters = [])
    {
        return array_merge(parent::getTemplateParameters([
            'alerts' => $this->getAlertsService()->getAlerts(),
        ]), $parameters);
    }

}