<?php

// session_start();

function flashMsg($name = '', $msg = '', $class = 'green') {
    if (!empty($name)) {
       if (!empty($msg) && empty($_SESSION[$name])) {

           if (!empty($_SESSION[$name])) {
               unset($_SESSION[$name]);
           }
           if (!empty($_SESSION[$name . '_class'])) {
            unset($_SESSION[$name . '_class']);
           }

           $_SESSION[$name] = $msg;
           $_SESSION[$name . '_class'] = $class;
       } elseif (empty($msg) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '
                        <div class="card ' . $class . ' lighten-3">
                            <div class="row">
                                <div class="col s12 m10">
                                    <div class="card-content black-text">
                                        <p class="center"> '.$_SESSION[$name].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
            ';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.  '_class']);
        } 
    }
}

function isLogged() {
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
function checkUserAccess() {

}
