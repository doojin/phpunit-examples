<?php

require_once('UserRepository.php');
require_once('UserService.php');
require_once('User.php');

/**
 * Class UserServiceTest
 * @property UserService $userService
 * @property UserRepository $userRepository
 * @property int $number
 */
class UserServiceTest extends PHPUnit_Framework_TestCase
{
    private $userService;
    private $userRepository;

    public function setUp()
    {
        $this->userRepository = new UserRepository();
        $this->userRepository->init();
        $this->userRepository->addUser(new User('customUser1', 'customPassword1', true));
        $this->userRepository->addUser(new User('customUser2', 'customPassword2', true));

        $this->userService = new UserService();
        $this->userService->setUserRepository($this->userRepository);
    }

    public function test_getActiveUsers_ShouldReturnAnArrayOfActiveUsers()
    {
        $expected = array(
            new User('user3', 'password3', true),
            new User('user4', 'password4', true),
            new User('customUser1', 'customPassword1', true),
            new User('customUser2', 'customPassword2', true)
        );

        $actual = $this->userService->getActiveUsers();

        $this->assertEquals($expected, $actual);
    }
}