<?php
	
	class Book 
	{
	
                private $id;
		private $title;
		private $isbn;
		private $author;
                private $category;
		private $description;
		private $price;
		
		public function __construct($title, $isbn,
			$author, $category, $description, $price) 
		{
			$this->title = $title;
			$this->isbn = $isbn;
			$this->author = $author;
                        $this->category = $category;
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
                
                public function setCategory($category) { $this->category = $category; }
                public function getCategory() { return $this->category ;}
                
		public function __toString() {
			$out = "";
		
			$out .= "<table>";
				$out .= "<tr>";
					$out .= "<td>";
                                        
                                            if (file_exists(dirname(__FILE__)."/../assets/images/".htmlentities($this->isbn).".jpg"))
						$out .= "<img src=\"http://localhost:8000/assets/images/".htmlentities($this->isbn).".jpg\" height=\"100\" width=\"100\" />";
                                            else
                                                $out .= "<img src=\"http://localhost:8000/assets/images/unknown.jpg\" height=\"100\" width=\"100\" />";
                                            
					$out .= "</td>";
					$out .= "<td>";
						$out .= "<strong>Title: </strong>".htmlentities($this->title) . "<br/>";
						$out .= "<strong>ISBN: </strong>".htmlentities($this->isbn) . "<br/>";
                                                $out .= "<strong>Author: </strong>".htmlentities($this->author) . "<br/>";
						$out .= "<strong>Description: </strong><br/>".htmlentities($this->description) . "<br/>";
						$out .= "<strong>Price: </strong>".htmlentities($this->price) . "<br/>";
					$out .= "</td>";
				$out .= "</tr>";
			$out .= "</table>";
			return $out."<hr/>";
		}
                
                public function toStringTableRow() {
                    $out = "";
                    $out .="<tr>";
                        $out .="<td>";
                                if (file_exists(dirname(__FILE__)."/../assets/images/".htmlentities($this->isbn).".jpg"))
                                    $out .= "<img src=\"http://localhost:8000/assets/images/".htmlentities($this->isbn).".jpg\" height=\"50\" width=\"50\" />";
                                else
                                    $out .= "<img src=\"http://localhost:8000/assets/images/unknown.jpg\" height=\"50\" width=\"50\" />";

                        $out .="</td>";

                        $out .="<td>";
                            $out .= htmlentities($this->title);
                        $out .="</td>";

                        $out .="<td>";
                            $out .= htmlentities($this->isbn);
                        $out .="</td>";

                        $out .="<td>";
                            $out .= htmlentities($this->author);
                        $out .="</td>";
                    $out .="</tr>";
                    return $out;
                }
	}

?>