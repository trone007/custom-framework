<?php

use DI\ContainerBuilder;

require_once "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::create(ROOT);
$dotenv->load();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$container = $containerBuilder->build();
return $container;