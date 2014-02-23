<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define ('CONTROLLER_DIR', dirname(__FILE__).'/../controllers/');

class RequestHandler 
{
    public function run() {
        // start the session
        session_start();
        
        list ($controller, $action) = $this->parseRequest();
        if (file_exists(CONTROLLER_DIR.$controller.".php"))
            require_once(CONTROLLER_DIR.$controller.".php");
        else {
            echo "404 - Invalid Request!!!!!!!!!!!";
        }

        $_SESSION['WEB_INDEX'] = 'http://localhost:8000/index.php';
        
        $rh = new $controller;
        echo $rh->$action();
    }
    
    private function parseRequest() {
        $controller = $action = "";
        if (!isset($_REQUEST['cmd'])) {
            $_SESSION['controller'] = $controller = "home";
            $_SESSION['action'] = $action = "index";
        }
        else {
            $arr = explode('/', $_REQUEST['cmd']);
            $_SESSION['controller'] = $arr[0];
            $_SESSION['action'] = $arr[1];
            list ($controller, $action) = $arr;
        }
        return array (ucfirst($controller)."Controller", $action."Action");
    }
}

?>