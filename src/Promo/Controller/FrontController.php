<?php

namespace Promo\Controller;

use Base\Controller\Controller;

class FrontController extends Controller
{

    function indexAction()
    {
        return $this->render('index', $this->getTemplateParameters([

        ]));
    }

}