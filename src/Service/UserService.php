<?php
namespace Src\Service;


use Doctrine\ORM\EntityManagerInterface;
use Src\Exceptions\WrongCredentialsException;

class UserService implements UserServiceInterface
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $username
     * @param $password
     * @throws WrongCredentialsException
     */
    function authenticate($username, $password): void
    {
        // TODO: Implement authenticate() method.
    }
}