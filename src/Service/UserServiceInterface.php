<?php
namespace Src\Service;
use Src\Exceptions\WrongCredentialsException;

interface UserServiceInterface
{
    /**
     * @param string $username
     * @param string $password
     * @throws WrongCredentialsException
     */
    public function authenticate(string $username, string $password): void;
}