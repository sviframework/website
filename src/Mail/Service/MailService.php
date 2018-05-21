<?php

namespace Mail\Service;

use Svi\TengineBundle\BundleTrait;
use User\Entity\User;

class MailService extends \Svi\MailBundle\Service\MailService
{
    use BundleTrait;

    public function restore(User $user)
    {
        $this->send($user, 'Восстановление пароля', 'restore');
    }

    public function send(User $user, $title, $template, array $params = [])
    {
        $text = $this->getTemplateService()->render("Mail/Views/$template.twig", array_merge([
            'user'     => $user,
            'title'    => $title,
            'sitename' => $this->app->getConfigService()->getParameter('sitename'),
            'siteurl'  => $this->app->getConfigService()->getParameter('siteurl'),
        ], $params));

        $message = new \Swift_Message($title, $text, 'text/html', 'utf8');
        $message
            ->setTo($user->getEmail())
            ->setFrom('no-reply@' . $this->app->getConfigService()->getParameter('siteurl'));

        $this->swiftMail($message);
    }

}