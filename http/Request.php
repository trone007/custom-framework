<?php
namespace Http;

class Request
{
    private $url;
    private $post;
    private $get;
    private $controller;
    private $action;
    private $params;
    private $file;

    private static $_instance = null;

    private function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->post = $_POST;
        $this->get = $_GET;
    }

    protected function __clone() {
    }

    static public function getInstance() {
        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function postParameter(string $key)
    {
        return $this->post[$key] ?? null;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getParameter(string $key)
    {
        return $this->get[$key] ?? null;
    }


    /**
     * @param string $key
     * @return mixed|null
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }



    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }


}