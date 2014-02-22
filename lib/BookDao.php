<?php
        require_once(dirname(__FILE__).'/../models/Book.php');
    
	class BookDao 
	{
		private $mysqli;
		private static $dao;
		
                /**
                 * Constructor
                 */
		private function __construct() 
		{
			$this->mysqli = mysqli_connect('localhost', 'webuser', 'password', 'demodb');	
		}
	
                /**
                 * Queries the database to retrieve all the books stored,
                 * converts the findings into Objects, and stores them in
                 * an array to be returned to the caller
                 * @return $books -- An array of Book Objects
                 */
		public function getBooks() 
		{
			$res = mysqli_query($this->mysqli, "SELECT * FROM tbl_books");
			//$books = array();
			while (($row = mysqli_fetch_array($res)))
				$books[] = new Book($row['title'], $row['isbn'],
					$row['author'], $row['description'], $row['price']);
			return (isset($books))? $books : null;
		}
                
                /**
                 * Receives an object as its argument, and persists it
                 * to the database.
                 * @param type $book -- An Object in need of persistence.
                 */
                public function create($book) {
                    $book->setDescription(addslashes($book->getDescription()));
                    
                    $sql = "INSERT INTO tbl_books (title, isbn, author, description, price) "
                            . "VALUES ('".$book->getTitle()."', '".$book->getIsbn()."', "
                            . "'".$book->getAuthor()."', '".$book->getDescription()."', '".$book->getPrice()."')";
                    mysqli_query($this->mysqli, $sql);
                    $book->setId(mysqli_insert_id($this->mysqli));
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
                    $res = mysqli_query($this->mysqli, $sql);
                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    
                    $book = null;
                    if (isset($row)) {
                        $book = new Book($row['title'], 
                            $row['isbn'], $row['author'], stripslashes($row['description']), $row['price']);
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
                            . " description= '".$book->getDescription()."', price= '".$book->getPrice()."' "
                            . "WHERE id={$book->getId()}";
                    $res = mysqli_query($this->mysqli, $sql);
                }
                
                /**
                 * Deletes a book from the database
                 */
                public function delete($book) {
                    $sql = "DELETE FROM tbl_books WHERE id = '".$book->getId()."'";
                    mysqli_query($this->mysqli, $sql);
                }


                /**
                 * Queries the database using the argument sql statement
                 * @param type $sql -- SQL statement to be executed.
                 */
                public function sql($sql) {
                    mysqli_query($this->mysqli, $sql);
                }
		
                public static function printTable($books) {
                    $out = "<table border=\"1\">";
                    foreach ($books as $book) {
                        $out .="<tr>";
                            $out .="<td>";
                                $out .= "<img src=\"http://localhost:8000/assets/images/{$book->getIsbn()}.jpg\" height=\"50\" width=\"50\"/>";
                            $out .="</td>";
                            
                            $out .="<td>";
                                $out .= $book->getTitle();
                            $out .="</td>";
                            
                            $out .="<td>";
                                $out .= $book->getIsbn();
                            $out .="</td>";
                            
                            $out .="<td>";
                                $out .= $book->getAuthor();
                            $out .="</td>";
                        $out .="</tr>";
                    }
                    
                    $out .= "</table>";
                    echo $out;
                }
                
                public function getCategories() {
                    $sql = "SELECT * FROM tbl_categories";
                    $res = mysqli_query($this->mysqli, $sql);
                    $arr = array();
                    while (($row = mysqli_fetch_array($res, MYSQLI_ASSOC)))
                            $arr[] = $row;
                    return $arr;
                }
                /**
                 * Static public function used to return an instance of this
                 * class. It is used to ensure that only a single instance of 
                 * this class is ever created.
                 * @return \Dao -- An instance of this class.
                 */
		public static function getInstance() 
		{
			if (isset($dao)) {
				return $dao;
			}
			else 
			{
				$dao = new BookDao();
				return $dao;
			}
		}
	}

?>