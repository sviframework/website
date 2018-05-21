<?php

namespace Admin;

class Bundle extends \Svi\Service\BundlesService\Bundle
{

    public function getRoutes()
    {
        return [
            'Front' => [
                '_admin' => '/admin:index',
            ],
        ];
    }

}