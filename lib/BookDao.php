<?php
        require_once(dirname(__FILE__).'/../models/Book.php');
    
	class BookDao 
	{
                private $dbh;
		private static $dao;
		
                /**
                 * Constructor
                 */
		private function __construct() 
		{
                        $this->dbh = new PDO("sqlite:".dirname(__FILE__)."/../data/app_db.db");
		}
	
                /**
                 * Queries the database to retrieve all the books stored,
                 * converts the findings into Objects, and stores them in
                 * an array to be returned to the caller
                 * @return $books -- An array of Book Objects
                 */
		public function getBooks() 
		{
                        $STH = $this->dbh->query('SELECT * FROM tbl_books');
                        # setting the fetch mode
                        $STH->setFetchMode(PDO::FETCH_ASSOC);
                    
			while ($row = $STH->fetch()) {
				$book = new Book($row['title'], $row['isbn'],
					$row['author'], $row['category_id'], $row['description'], $row['price']);
                                $book->setId($row['id']);
                                $books[] = $book;
                        }
			return (isset($books))? $books : null;
		}
                
                /**
                 * Receives an object as its argument, and persists it
                 * to the database.
                 * @param type $book -- An Object in need of persistence.
                 */
                public function create($book) {
                    $book->setDescription(addslashes($book->getDescription()));
                    
                    $sql = "INSERT INTO tbl_books (title, isbn, author, description, price, category_id) "
                            . "VALUES ('".$book->getTitle()."', '".$book->getIsbn()."', "
                            . "'".$book->getAuthor()."', '".$book->getDescription()."', '".$book->getPrice()."', '".$book->getCategory()."')";
                    $STH = $this->dbh->query($sql);
                    $book->setId($this->dbh->lastInsertId());
                    return $book;
                }

                /**
                 * Queries the database looking for the book, using the
                 * primary key (id) as the method argument.
                 * @param type $pk -- The primary key, used as the basis
                 * of the query.
                 * @return $book -- the book queried from the database or null.
                 */
                
                public function findByPrimaryKey ($pk) {
                    $sql = "SELECT * FROM tbl_books WHERE id={$pk}";
                    $STH = $this->dbh->query($sql);
                    $STH->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $STH->fetch();
                    
                    $book = null;
                    if ($row != FALSE) {
                        $book = new Book($row['title'], 
                            $row['isbn'], $row['author'], $row['category_id'], stripslashes($row['description']), $row['price']);
                        $book->setId($row['id']);
                    }
                    return ($book != null)? $book : null;
                }
                
                /**
                 * Updates the book
                 */
                public function update($book) {
                    $sql = "UPDATE tbl_books SET title= '".$book->getTitle()."', "
                            . "isbn= '".$book->getIsbn()."', author= '".$book->getAuthor()."',"
                            . " description= '".$book->getDescription()."', price= '".$book->getPrice()."', category_id='".$book->getCategory()."' "
                            . "WHERE id={$book->getId()}";
                    $STH = $this->dbh->query($sql);
                }
                
                /**
                 * Deletes a book from the database
                 */
                public function delete($book) {
                    $sql = "DELETE FROM tbl_books WHERE id = '".$book->getId()."'";
                    $STH = $this->dbh->query($sql);
                }


                /**
                 * Queries the database using the argument sql statement
                 * @param type $sql -- SQL statement to be executed.
                 */
                public function sql($sql) {
                    $this->dbh->query($sql);
                }
		
                /**
                 * Creates an HTML table given an array of book objects.
                 */
                public static function printTable($books) {
                    $out = "<table border=\"1\">";
                    foreach ($books as $book) {
                        $out .= $book->toStringTableRow();
                    }
                    $out .= "</table>";
                    echo $out;
                }
                
                /**
                 * Finds and returns all the categories in the categories table.
                 */
                public function getCategories() {
                    $sql = "SELECT * FROM tbl_categories";
                    $STH = $this->dbh->query($sql);
                    $STH->setFetchMode(PDO::FETCH_ASSOC);
                    $arr = array();
                    while ($row = $STH->fetch())
                            $arr[] = $row;
                    return $arr;
                }
                
                /**
                 * Queries the database and returns all the books belonging
                 * to a particular category id (function argument).
                 * @return type arr -- An array of books.
                 */
                public function findBooksByCategory($id) {
                    $sql = "SELECT * FROM tbl_books WHERE category_id={$id}";
                    $STH = $this->dbh->query($sql);
                    $STH->setFetchMode(PDO::FETCH_ASSOC);
                    //$arr = array();
                    while ($row = $STH->fetch())
                            $arr[] = new Book($row['title'], 
                                $row['isbn'], $row['author'], $row['category_id'], stripslashes($row['description']),
                                    $row['price']);
                    return (isset($arr))? $arr : null;
                }
                /**
                 * Static public function used to return an instance of this
                 * class. It is used to ensure that only a single instance of 
                 * this class is ever created.
                 * @return \Dao -- An instance of this class.
                 */
		public static function getInstance() 
		{
			if (isset(self::$dao)) {
				return self::$dao;
			}
			else 
			{
				self::$dao = new BookDao();
				return self::$dao;
			}
		}
	}

?>