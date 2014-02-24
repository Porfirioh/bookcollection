<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('framework/Template.php');
require_once(dirname(__FILE__).'/../lib/BookDao.php');

class HomeController 
{
    public function __construct() {
        //session_start();
    }
    public function indexAction() 
    {
        $tpl_name = VIEWS_DIR.ucfirst($_SESSION['controller'])."/".$_SESSION['action'].".tpl";
        $tpl = new Template($tpl_name);
        $tpl->assign('books', BookDao::getInstance()->getBooks());
        $tpl->assign("title", "Some Books I have");
        return $tpl->asHtml();
    }
    
    public function addAction() {
        $tpl_name = VIEWS_DIR.ucfirst($_SESSION['controller'])."/".$_SESSION['action'].".tpl";
        $tpl = new Template($tpl_name);
        $tpl->assign('books', BookDao::getInstance()->getBooks());
        return $tpl->asHtml();
    }
    
    public function categoriesAction() {
        $tpl_name = VIEWS_DIR.ucfirst($_SESSION['controller'])."/".$_SESSION['action'].".tpl";
        $tpl = new Template($tpl_name);
        $tpl->assign("categories", BookDao::getInstance()->getCategories());
        return $tpl->asHtml();
    }
    
    public function aboutAction() {
        $tpl_name = VIEWS_DIR.ucfirst($_SESSION['controller'])."/".$_SESSION['action'].".tpl";
        $tpl = new Template($tpl_name);
        return $tpl->asHtml();
    }
    
    public function addBookAction() {
        $title = $_REQUEST['title'];
        $isbn = $_REQUEST['isbn'];
        $author = $_REQUEST['author'];
        $category = $_REQUEST['category'];
        $description = addslashes($_REQUEST['description']);
        $price = $_REQUEST['price'];
        
        $book = new Book($title, $isbn, $author, $category, $description, $price);
        
        BookDao::getInstance()->create($book);
        header("Location: http://localhost:8000/index.php");
        exit();
    }
    
}


?>

