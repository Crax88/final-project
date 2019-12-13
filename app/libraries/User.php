<?php 

class User 
{
    public function __construct() {
        session_start();
    }

    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }
    public function __get($name) {
        
        return $_SESSION[$name] ?? false;
    }
    public function __unset($name) {
        unset($_SESSION[$name]);
    }
    public function __isset($name) {
        return isset($_SESSION[$name]);
    }

    public function checkAccess($privileges) {
        $privileges = (array) $privileges;
        foreach ($privileges as $p) {
            if ($p == '*') {
                return true;
            }
            if ($p == '@') {
                if ($this->isUser()) {
                    return true;
                }
            }

        }
    }

    public function isUser() {
        return isset($this->id);
    }
    // public function checkAccess($checkCond, $access) {
    //     switch ($checkCond) {
    //         case 'users':
    //             if ($access[0] == '*') {
    //                 return true;
    //             }
    //             if ($access[0] == '@') {
    //                 if (isset($this->id)) {
    //                     return true;
    //                 }
    //             }
    //             break;
    //         case 'roles':
    //             foreach ($access as $a) {
    //                 if (in_array($a, $this->role)) {
    //                     return true;
    //                 }
    //             }
    //             break;
    //         case 'privileges':
    //             foreach ($access as $a) {
    //                 if (in_array($a, $this->privileges)) {
    //                     return true;
    //                 }
    //             }
    //             foreach ($this->privileges as $privileg) {
    //                 if (in_array($privileg, $access)) {
    //                     return true;
    //                     break;
    //                 }
    //             }
    //     }
    // }
    // return false;
}