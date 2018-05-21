<?php

namespace Mail;

use Mail\Service\MailService;

trait BundleTrait
{

    /**
     * @return MailService
     */
    protected function getMailService()
    {
        return $this->app[MailService::class];
    }

}