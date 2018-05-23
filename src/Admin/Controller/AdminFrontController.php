<?php

namespace Admin\Controller;

class AdminFrontController extends Controller
{

    public function indexAction()
    {
        return $this->render('index', $this->getTemplateParameters([

        ]));
    }

}