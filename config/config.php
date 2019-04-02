<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Src\Service\CredentialsService;
use Src\Service\CredentialsServiceInterface;
use Src\Service\TaskService;
use Src\Service\TaskServiceInterface;
use Src\Service\UserService;
use Src\Service\UserServiceInterface;


return [
    // Configure EntityManagerInterface realization
    EntityManagerInterface::class => function() {
        $isDevMode = boolval($_ENV['DEV_MODE']);
        $entityPath = [sprintf('%s/../%s', __DIR__, $_ENV['ENTITY_DIRECTORY'])];

        $config = Setup::createAnnotationMetadataConfiguration($entityPath, $isDevMode);

        $conn = array(
            'driver' => $_ENV['DB_DRIVER'],
            'path' => $_ENV['DB_PATH'],
        );

        return EntityManager::create($conn, $config);
    },
    // Configure Twig
    \Twig\Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader(VIEWS_ROOT);
        return new \Twig\Environment($loader);
    },

    CredentialsServiceInterface::class => DI\get(CredentialsService::class),
    TaskServiceInterface::class => DI\get(TaskService::class),
    UserServiceInterface::class => DI\get(UserService::class)
];