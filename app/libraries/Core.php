<?php

class Core 
{
    private static $instance = null;
    private $request = null;
    private $user = null;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function app() {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function lunch() {
        $this->request = new Request;
        $this->user = new User;
        try {
            $this->runController($this->request->controller, $this->request->action);
        } catch (httpException $error) {
            $error->sendHttpState();
            
                Core::app()->request->action = $error->getCode();
                $this->runController('Errors', $error->getCode());
            
            
        }
    }
    
    private function runController($controllerName, $actionName) {
        if ($controllerName == 'Errors') {
            Core::app()->request->action = $actionName;
        }
        $controllerName = 'controller' . ucfirst(strtolower($controllerName));
        $cFile = APPROOT . '/' . 'controllers' . '/' . $controllerName . '.php';
        $actionName = 'action' . ucfirst(strtolower($actionName));

        if (file_exists($cFile)) {
            include_once $cFile;
        } else {
            throw new httpException(404, $controllerName . ' not found in ' . $cFile);
        }
        if (method_exists($controllerName, $actionName)) {
            $controller = new $controllerName;
            $controller->$actionName();
        } else {
            throw new httpException(404, $actionName . 'not found in ', $cFile);
        }
    }

    public function __get($name) {
        return $this->$name;
    }
}


