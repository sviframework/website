<?php

namespace User\Controller;

use Base\Controller\Controller;
use Svi\HttpBundle\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use User\BundleTrait;

class RestoreController extends Controller
{
    use BundleTrait;

    public function step1Action(Request $request)
    {
        $form = $this->createForm()
            ->add('email', 'email', [
                'label'    => 'form.restore.email',
                'required' => true,
            ])
            ->add('submit', 'submit', [
                'label' => 'form.restore.submit',
            ]);

        if ($form->handleRequest($request)->isValid()) {
            $email = $form->get('email')->getData();

            if (!($user = $this->getUserService()->getUserByEmail($email))) {
                $form->addError('form.restore.error');
            }

            if ($form->isValid()) {
                $this->getUserService()->resetRestoreHash($user);
                $this->getAlertsService()->addAlert('success', 'form.restore.successSend');

                return $this->redirect('_login');
            }
        }

        return $this->render('step1', $this->getTemplateParameters([
            'form' => $form,
        ]));
    }

    public function step2Action($hash, Request $request)
    {
        if (!($user = $this->getUserService()->getByRestoreHash($hash))) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm()
            ->add('password', 'password', [
                'label' => 'form.restore.password',
                'required' => true,
            ])
            ->add('repeat', 'password', [
                'label' => 'form.restore.repeat',
                'required' => true,
            ])
            ->add('submit', 'submit', [
                'label' => 'form.restore.submit1',
            ]);

        if ($form->handleRequest($request)->isValid()) {
            $data = $form->getData();

            if ($data['password'] != $data['repeat']) {
                $form->addError('form.restore.error1');
            }

            if ($form->isValid()) {
                $user->setPassword($this->getUserService()->hashPassword($data['password']));
                $this->getUserManager()->save($user);
                $this->getAlertsService()->addAlert('success', 'form.restore.success1');

                return $this->redirect('_login');
            }
        }

        return $this->render('step2',$this->getTemplateParameters([
            'form' => $form,
        ]));
    }

}