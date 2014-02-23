<?php
        require_once(dirname(__FILE__).'/../models/Book.php');
    
	class CategoryDao 
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
		public function findName($catid) 
		{
                    $sql = "SELECT name FROM tbl_categories WHERE id={$catid}";
                    $res = mysqli_query($this->mysqli, $sql);
                    $name = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    return (isset($name))? $name['name'] : null;
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
				$dao = new CategoryDao();
				return $dao;
			}
		}
	}

?>