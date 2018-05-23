<?php

namespace Promo\Controller;

use Admin\Controller\CrudController;
use Doctrine\DBAL\Query\QueryBuilder;
use Promo\BundleTrait;
use Promo\Entity\Menu;
use Svi\HttpBundle\Forms\Form;
use Svi\OrmBundle\Entity;
use Svi\OrmBundle\Manager;

class AdminMenuController extends CrudController
{
    use BundleTrait;

    protected function getListColumns()
    {
        return [
            'title' => 'Название',
        ];
    }

    protected function isSortable()
    {
        return true;
    }

    /**
     * @param Form $form
     * @param Menu $entity
     */
    protected function buildForm(Form $form, Entity $entity)
    {
        $form
            ->add('title', 'text', [
                'label' => 'Название',
                'required' => true,
                'data' => $entity->getTitle(),
            ])
            ->add('url', 'text', [
                'label' => 'URL',
                'required' => true,
                'data' => $entity->getUrl(),
            ]);
    }

    protected function getRoutes()
    {
        return [
            'add'    => '_admin_menu_add',
            'edit'   => '_admin_menu_edit',
            'delete' => '_admin_menu_delete',
        ];
    }

    protected function getManager()
    {
        return $this->getMenuManager();
    }

}