<?php

require_once('User.php');

/**
 * Class UserRepository
 * @property array users
 */
class UserRepository
{
    private $users = array();

    public function init()
    {
        $this->users[] = new User('user1', 'password1');
        $this->users[] = new User('user2', 'password2');
        $this->users[] = new User('user3', 'password3', true);
        $this->users[] = new User('user4', 'password4', true);
        $this->users[] = new User('user5', 'password5');
    }

    /**
     * @param User $user
     */
    public function addUser($user)
    {
        $this->users[] = $user;
    }

    /**
     * @return User[]
     */
    public function getUserList()
    {
        return $this->users;
    }
}