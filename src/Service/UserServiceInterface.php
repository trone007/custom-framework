<?php
namespace Src\Service;
use Src\Exceptions\WrongCredentialsException;

interface UserServiceInterface
{
    /**
     * @param $username
     * @param $password
     * @throws WrongCredentialsException
     */
    function authenticate($username, $password): void;
}