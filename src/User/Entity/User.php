<?php

namespace User\Entity;

use Svi\OrmBundle\Entity;

class User extends Entity
{
    private $id;
    private $email;
    private $password;
    private $restoreHash;
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRestoreHash()
    {
        return $this->restoreHash;
    }

    /**
     * @param mixed $restoreHash
     * @return $this
     */
    public function setRestoreHash($restoreHash)
    {
        $this->restoreHash = $restoreHash;

        return $this;
    }

    public function resetRestoreHash()
    {
        return $this->setRestoreHash(md5(time() . $this->getRole() . rand() . $this->getPassword() . microtime() . $this->getEmail()));
    }

}