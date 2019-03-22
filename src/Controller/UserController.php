<?php
namespace Src\Controller;

use Core\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Src\Exceptions\WrongCredentialsException;
use Src\Service\UserServiceInterface;
use Twig\Environment;

class UserController extends Controller
{
    private $userService;

    public function __construct(
        Environment $twig,
        EntityManagerInterface $entityManager,
        UserServiceInterface $userService
    )
    {
        parent::__construct($twig, $entityManager);
        $this->userService = $userService;
    }

    public function index()
    {
        $this->render('login');
    }

    public function login()
    {
        if(
            $username = $this->request->postParameter('username')
            &&
            $password = $this->request->postParameter('password')
        ) {
            try {
                $this->userService->authenticate($username, $password);
            } catch (WrongCredentialsException $e) {
            }
        }

        $this->render('login');
    }
}