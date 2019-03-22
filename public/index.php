<?php
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('WEB_ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('VIEWS_ROOT', sprintf("%ssrc/Views/", ROOT));
define('CACHE_DIR', sprintf("%scache/", ROOT));

$container = require ROOT . '/config/bootstrap.php';

$dispatcher = new \Http\Dispatcher($container);

$dispatcher->dispatch();



