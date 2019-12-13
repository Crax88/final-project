<?php

class Controller 
{
    public function __construct() {
        // if (!$this->checkAccess()) {
        //     throw new httpException(403, 'Access denied');
        // }
    }
    protected function checkAccess() {
        
        foreach ($this->access as $rule) {
            if (in_array(Core::app()->request->action, $rule['actions'])) {
                if (Core::app()->user->checkAccess($rule['privileges'])) {
                    switch ($rule[0] ?? '') {
                        case 'allow':
                            return true;
                            break;
                        case 'deny':
                            return false;
                            break;
                    }  
    
                }
            }
        }
        return false;
    }
    public function model($model) {
        $model = 'model' . ucfirst($model);
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('view does not exists');
        }
    }
}