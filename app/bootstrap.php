<?php

require_once 'config/config.php';
require_once 'helpers/redirect_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/image_uploader.php';

spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});