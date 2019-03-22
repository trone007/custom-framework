<?php

use function DI\create;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Src\Service\UserService;
use Src\Service\UserServiceInterface;


return [
    EntityManagerInterface::class => function() {
        $isDevMode = boolval($_ENV['DEV_MODE']);
        $entityPath = [ROOT . $_ENV['ENTITY_DIRECTORY']];

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

    UserServiceInterface::class => function(\DI\Container $c) {
        return new UserService($c->get(EntityManagerInterface::class));
    }
];