<?php

namespace Admin;

use Svi\Application;
use Svi\HttpBundle\BundleTrait;
use Svi\HttpBundle\Service\HttpService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class Bundle extends \Svi\Service\BundlesService\Bundle
{
    use BundleTrait;
    use \User\BundleTrait;

    public function __construct(Application $app)
    {
        parent::__construct($app);

        if (!$app->isConsole()) {
            $this->getHttpService()->before(function (Request $request) {
                if (strpos($request->getRequestUri(), '/admin') !== false && !$this->getUserService()->getCurrentAdmin()) {
                    return new RedirectResponse('/');
                }
            });
        }
    }

    public function getRoutes()
    {
        return [
            'AdminFront' => [
                '_admin' => '/admin:index',
            ],
            'AdminSettings' => [
                '_admin_settings' => '/admin/settings:index',
            ],
        ];
    }

}