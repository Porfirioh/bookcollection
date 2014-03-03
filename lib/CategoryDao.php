<?php
        require_once(dirname(__FILE__).'/../models/Book.php');
    
	class CategoryDao 
	{
                private $dbh;
		private static $dao;
		
                /**
                 * Constructor
                 */
		private function __construct() 
		{
                    $this->dbh = new PDO($dsn="sqlite:".dirname(__FILE__)."/../data/app_db.db");
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
                    $STH = $this->dbh->query($sql);
                    $STH->setFetchMode(PDO::FETCH_ASSOC);
                    $name = $STH->fetch();
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
			if (isset(self::$dao)) {
				return self::$dao;
			}
			else 
			{
				self::$dao = new CategoryDao();
				return self::$dao;
			}
		}
	}

?>