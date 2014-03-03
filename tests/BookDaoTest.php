<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once(dirname(__FILE__).'/../models/Book.php');
    require_once(dirname(__FILE__).'/../lib/BookDao.php');
    
    class BookDaoTest extends PHPUnit_Framework_TestCase 
    {
        public function setUp() {
            $sql = file_get_contents("../data/tables.sql");
            BookDao::getInstance()->sql($sql);
        }
        
        public function testGetBooks() {
            $books = BookDao::getInstance()->getBooks();
            $this->assertTrue(count($books)>0);
        }

        public function testCreateBook() 
        {
            // create book
            $book = new Book("Secrets of the Javascript Ninja", "123-456789", "John Resig", 3, "Probably the best book about"
                    . " javascript that I have read. Recommended for masterful javascript programmers.", 39.99);
            BookDao::getInstance()->create($book);
            
            // confirm creation
            $book = BookDao::getInstance()->findByPrimaryKey($book->getId());
            $this->assertTrue("Secrets of the Javascript Ninja" == $book->getTitle());
            
            // delete the book
            BookDao::getInstance()->delete($book);
        }
        
        public function testFindByPrimaryKey() {
            $book = BookDao::getInstance()->findByPrimaryKey($pk=1);
            $this->assertEquals('PHP In Action', $book->getTitle());
        }
        
        public function testUpdate() {
            $book = BookDao::getInstance()->findByPrimaryKey($pk=1);
            
            //change title from php in action
            $book->setTitle('whatever');
            $book->setPrice(39.99);
            //update database
            BookDao::getInstance()->update($book);
            
            $this->assertEquals(BookDao::getInstance()->findByPrimaryKey($pk=1)->getTitle(),
                    'whatever');
            
            // set conditions back to previous state
            $book->setTitle('PHP In Action');
            BookDao::getInstance()->update($book);
        }
        
        public function testDelete() {
            // create book
            $book = new Book("Starting Java EE 6 With GlassFish", "123-456789", "Antonio Goncalves", 1, "A great book about Java EE 6."
                . " Well-written and intended for all audiences. The book provides a lot of great examples.", 49.99);
            $book = BookDao::getInstance()->create($book);
        
            // verify book creation
            $this->assertNotNull(
                    BookDao::getInstance()->findByPrimaryKey($book->getId()));
            
            // delete and verify deletion
            BookDao::getInstance()->delete($book);
            $this->assertNull(BookDao::getInstance()->findByPrimaryKey($book->getId()));
        }
        
        public function testFindBookByCategory() {
            $books = BookDao::getInstance()->findBooksByCategory($id=1);
            $this->assertTrue(count($books) > 0);
        }
        
        public function tearDown() {
        }
    }
    
?>