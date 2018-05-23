<?php

namespace Admin\Controller;

abstract class CrudController extends \Svi\CrudBundle\Controller\CrudController
{
    use AdminControllerTrait;

    protected function getBaseTemplate()
    {
        return 'Admin/Views/base.twig';
    }
}