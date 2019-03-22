<?php
namespace Http;

use DI\Container;

class Dispatcher
{
    /** @var Request */
    private $request;

    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function dispatch()
    {
        $this->request = Request::getInstance();
        Router::parse($this->request->getUrl(), $this->request);
        $controller = $this->loadController();

        $this->container->call($controller, $this->request->getParams());
    }

    private function loadController(): string
    {
        $controller = sprintf('\Src\Controller\%sController', ucfirst($this->request->getController()));
        $action = $this->request->getAction();

        if(!class_exists($controller) || !method_exists($controller, $action)) {
            Router::pageNotFound();
        }

        return $controller . '::' . $action;
    }


}
