<?php

namespace User\Controller;

use Base\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use User\BundleTrait;

class LoginController extends Controller
{
    use BundleTrait;

    public function indexAction(Request $request)
    {
        $form = $this->createForm()
            ->add('email', 'email', [
                'label' => 'form.login.email',
                'required' => true,
            ])
            ->add('password', 'password', [
                'label' => 'form.login.password',
                'required' => true,
            ])
            ->add('submit', 'submit', [
                'label' => 'form.login.submit',
            ]);

        if ($form->handleRequest($request)->isValid()) {
            $data = $form->getData();
            if (!($user = $this->getUserService()->getUserByEmail($data['email']))) {
                $form->addError('form.login.noFound');
            } elseif ($user->getPassword() !== $this->getUserService()->hashPassword($data['password'])) {
                $form->addError('form.login.noFound');
            }

            if ($form->isValid()) {
                $this->getUserService()->login($user, true);
                $this->getAlertsService()->addAlert('success', 'form.login.success');

                return $this->redirect('_admin');
            }
        }

        return $this->render('index', $this->getTemplateParameters([
            'form' => $form,
        ]));
    }

    public function logoutAction()
    {
        $this->getUserService()->logout();

        return $this->redirect('/');
    }

}