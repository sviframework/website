<?php

namespace Mail;

use Mail\Service\MailService;

class Bundle extends \Svi\Service\BundlesService\Bundle
{

    protected function getServices()
    {
        return [
            MailService::class,
        ];
    }

}