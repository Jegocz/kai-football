<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

$container = new \App\Core\Container();

$dependencyProvider = new \App\Core\DependencyProvider();
$dependencyProvider->provideDependencies($container);

/** @var \App\Core\ViewInterface $view */
$view = $container->get(\App\Core\View::class);
$view->init();

if (isset($_SERVER['REQUEST_URI'])) {
    $calledControllerRawName = $_SERVER['REQUEST_URI'];
    $beginOfGetParameter = strpos($calledControllerRawName, '?');
    $calledControllerRawName = substr($calledControllerRawName, 1, $beginOfGetParameter - 1);
    $calledControllerName = ucfirst($calledControllerRawName) . 'Controller';
    $controllerPath = 'App\\Controller\\' . $calledControllerName;
}

try {
    $controller = $container->get($controllerPath);
} catch (Exception $exception) {
    $controller = $container->get(\App\Controller\TableController::class);
}

/** @var \App\Controller\ControllerInterface $controller */
$controller->action();
