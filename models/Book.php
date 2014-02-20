<?php
	
	class Book 
	{
	
                private $id;
		private $title;
		private $isbn;
		private $author;
		private $description;
		private $price;
		
		public function __construct($title, $isbn,
			$author, $description, $price) 
		{
			$this->title = $title;
			$this->isbn = $isbn;
			$this->author = $author;
			$this->description = $description;
			$this->price = $price;
		}

                public function getId() { return $this->id ;}
                public function setId($id) { $this->id = $id; }
                
                public function getTitle() { return $this->title ;}
                public function setTitle($title) { $this->title = $title; }
                
                public function getIsbn() { return $this->isbn ;}
                public function getAuthor() { return $this->author ;}
                
                public function setDescription($description) { $this->description = $description;}
                public function getDescription() { return $this->description ;}
                
                public function setPrice($price) { $this->price = $price; }
                public function getPrice() { return $this->price ;}
                
		public function __toString() {
			$out = "";
		
			$out .= "<table>";
				$out .= "<tr>";
					$out .= "<td>";
						$out .= "<img src=\"http://localhost/My_APPS/bookcollection/assets/images/".htmlentities($this->isbn).".jpg\" height=\"100\" width=\"100\" />";
					$out .= "</td>";
					$out .= "<td>";
						$out .= "<strong>Title: </strong>".htmlentities($this->title) . "<br/>";
						$out .= "<strong>ISBN: </strong>".htmlentities($this->isbn) . "<br/>";
                                                $out .= "<strong>Author: </strong>".htmlentities($this->author) . "<br/>";
						$out .= "<strong>Description: </strong>".htmlentities($this->description) . "<br/>";
						$out .= "<strong>Price: </strong>".htmlentities($this->price) . "<br/>";
					$out .= "</td>";
				$out .= "</tr>";
			$out .= "</table>";
			return $out."<hr/>";
		}
	}

?>