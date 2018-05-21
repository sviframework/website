<?php

namespace User\Service;

use User\BundleTrait;
use User\Entity\User;

class UserService extends \Svi\HttpBundle\Service\UserService
{
    use BundleTrait;
    use \Mail\BundleTrait;

    private $current = false;

    /**
     * @return null|User
     * @throws \ErrorException
     */
    public function getCurrentUser()
    {
        if ($this->current === false) {
            $this->current = null;

            $id = $this->getAuthorisedUserId();
            if ($id) {
                list($id, $password) = explode(':', $id);

                if (($user = $this->getById($id)) && $user->getPassword() === $password) {
                    $this->current = $user;
                }
            }
        }

        return $this->current;
    }

    /**
     * @param $id
     * @return User|null
     * @throws \ErrorException
     */
    public function getById($id)
    {
        return $this->getUserManager()->findOneById($id);
    }

    public function login(User $user)
    {
        $this->loginUser(implode(':', [$user->getId(), $user->getPassword()]));
    }

    public function hashPassword($password)
    {
        return hash('sha512', $password);
    }

    /**
     * @param $hash
     * @return User|null
     * @throws \ErrorException
     */
    public function getByRestoreHash($hash)
    {
        return $this->getUserManager()->findOneByRestoreHash($hash);
    }

    /**
     * @param $email
     * @return User|null
     * @throws \ErrorException
     */
    public function getUserByEmail($email)
    {
        return $this->getUserManager()->findOneByEmail(strtolower($email));
    }

    public function resetRestoreHash(User $user)
    {
        $this->getUserManager()->save($user->resetRestoreHash());
        $this->getMailService()->restore($user);
    }

}