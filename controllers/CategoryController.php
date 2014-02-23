<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('framework/Template.php');
require_once(dirname(__FILE__).'/../lib/BookDao.php');
require_once(dirname(__FILE__).'/../lib/CategoryDao.php');

class CategoryController 
{
    public function __construct() {
        //session_start();
    }
    public function viewAction() 
    {
        $tpl_name = VIEWS_DIR.ucfirst($_SESSION['controller'])."/".$_SESSION['action'].".tpl";
        $tpl = new Template($tpl_name);
        $tpl->assign('title', CategoryDao::getInstance()->findName($_REQUEST['id']));
        $tpl->assign('books', BookDao::getInstance()->findBooksByCategory($_REQUEST['id']));
        return $tpl->asHtml();
    }    
}


?>

