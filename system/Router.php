<?php

namespace Application\system;

class Router
{
    protected $controllerNamespace = "Application\app\controllers\\";
    protected $_router_exists=false;

    private function isController($requestMethod)
    {
        $method = explode("@", $requestMethod);
        if (count($method) != 2) {
            throw new \Exception("Invalid Controller Method");
        }

        $controllerName = $method[0];
        $methodName = $method[1];
        $controller = $this->controllerNamespace . $controllerName;
        if (!class_exists($controller)) {
            throw new \Exception("Controller not found");
        }

        $controller = new $controller();
        if (!method_exists($controller, $methodName)) {
            throw new \Exception("Method not found");
        }
        $controller->$methodName();
        return true;

    }

    public function get($requestUri, $requestMethod, $middleware = [])
    {
        if (!Request::method("get")) {
            return false;
        }

        if (empty($requestUri)) {
            throw new \Exception("Request URI is empty");
        }

        $url = Server::url();
        if ($url == $requestUri) {
            $this->_router_exists=true;
            $this->isController($requestMethod);
        }
        return false;

    }

    public function post($requestUri, $requestMethod, $middleware = [])
    {
        if (!Request::method("post")) {
            return false;
        }

        if (empty($requestUri)) {
            throw new \Exception("Request URI is empty");
        }

        $url = Server::url();
        if ($url == $requestUri) {
            $this->_router_exists=true;
            $this->isController($requestMethod);
        }
        return false;

    }

    public function RouterExists()
    {
        return $this->_router_exists;
    }
}

?>