<?php

namespace Promo\Manager;

use Promo\Entity\Menu;

class MenuManager extends  \Svi\OrmBundle\Manager
{

    public function getDbFieldsDefinition()
    {
        return [
            'id' => ['id', 'smallint', 'id'],
            'title' => ['title', 'string', 'length' => 128],
            'url' => ['url', 'string', 'length' => 255, 'null'],
            'weight' => ['weight', 'smallint', 'null'],
            'parentId' => ['parent_id', 'smallint', 'null'],
        ];
    }

    public function getTableName()
    {
        return 'menu';
    }

    public function getEntityClassName()
    {
        return Menu::class;
    }

}