<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// MOst Recent changes

require_once('framework/Template.php');
require_once(dirname(__FILE__).'/../lib/BookDao.php');

class HomeController 
{
    public function indexAction() 
    {
        $tpl = new Template(VIEWS_DIR."Home/index.tpl");
        $tpl->assign('books', Dao::getInstance()->getBooks());
        $tpl->assign("title", "Some Books I have");
        return $tpl->asHtml();
    }
    
    public function addAction() {
        $tpl = new Template(VIEWS_DIR."Home/add.tpl");
        return $tpl->asHtml();
    }
    
    public function addBookAction() {
        $title = $_REQUEST['title'];
        $isbn = $_REQUEST['isbn'];
        $author = $_REQUEST['author'];
        $description = addslashes($_REQUEST['description']);
        $price = $_REQUEST['price'];
        
        $book = new Book($title, $isbn, $author, $description, $price);
        
        Dao::getInstance()->create($book);
        header("Location: http://localhost:8000/index.php");
        exit();
    }
    
}


?>

