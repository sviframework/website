<?php

namespace Promo;

class Bundle extends \Svi\Service\BundlesService\Bundle
{

    public function getRoutes()
    {
        return [
            'Front' => [
                '_front' => '/:index',
            ],
        ];
    }

}