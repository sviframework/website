<?php

namespace User\Manager;

use Svi\OrmBundle\Manager;
use User\Entity\User;

class UserManager extends Manager
{
    public function getDbFieldsDefinition()
    {
        return [
            'id'          => ['id', 'integer', 'id'],
            'email'       => ['email', 'string', 'length' => 64],
            'password'    => ['password', 'string', 'length' => 128],
            'restoreHash' => ['restore_hash', 'string', 'length' => 32, 'null'],
            'role'        => ['role', 'string', 'length' => 16],
        ];
    }

    public function getTableName()
    {
        return 'users';
    }

    public function getEntityClassName()
    {
        return User::class;
    }

}