<html>
	<head>
		<?php require_once(dirname(__FILE__).'/../../models/Book.php'); ?>
		<?php require_once(dirname(__FILE__).'/../../lib/BookDao.php'); ?>
		
		<title>My Book Collection</title>
                <link rel="stylesheet" href="http://localhost/My_APPS/bookcollection/assets/style/style.css" type="text/css"/>
		<script type="text/javascript" src="http://localhost/My_APPS/bookcollection/assets/javascript/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/My_APPS/bookcollection/assets/javascript/javascript_lib.js"></script>
	</head>
	
	<body>
		<div id="wrapper">
		
			<!-- masthead -->
			<div id="masthead">
				<span class="masthead_title">My Book Collection</span>
				
				<div id="masthead_menu">
					<a href="index.php">Home</a> | <a href="index.php?cmd=home/add">Add Book</a> |<a href="#">Categories</a> | <a href="#">About</a>
				</div>
			</div>
                        