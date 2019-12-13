<?php

class Request 
{
    public $request = '';
    public $controller = 'Main';
    public $action = 'Index';
    public $params = [];
    public $isForm = false;

    public function __construct() {
       $this->request = $_REQUEST;
       if (!empty($this->request['controller'])) {
           $this->controller = trim($this->request['controller']);
           unset($this->request['controller']);
       }
       if (!empty($this->request['action'])) {
           $this->action = trim($this->request['action']);
           unset($this->request['action']);
       }
       if (!empty($this->request['params'])) {
           $this->params = $this->request['params'];
           unset($this->request['params']);
       }
       if (isset($this->request['submit'])) {
           $this->isForm = true;
           unset($this->request);
       }
    }
}