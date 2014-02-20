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
        list ($controller, $action) = $this->parseRequest();
        if (file_exists(CONTROLLER_DIR.$controller.".php"))
            require_once(CONTROLLER_DIR.$controller.".php");
        else {
            echo "404 - Invalid Request!!!!!!!!!!!";
        }
        
        $rh = new $controller;
        echo $rh->$action();
    }
    
    private function parseRequest() {
        $controller = $action = "";
        if (!isset($_REQUEST['cmd'])) {
            $controller = "home";
            $action = "index";
        }
        else
            list ($controller, $action) = explode('/', $_REQUEST['cmd']);
        
        return array (ucfirst($controller)."Controller", $action."Action");
    }
}

?>