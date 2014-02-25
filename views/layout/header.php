<html>
	<head>
		<?php require_once(dirname(__FILE__).'/../../models/Book.php'); ?>
		<?php require_once(dirname(__FILE__).'/../../lib/BookDao.php'); ?>
		
		<title>My Book Collection</title>
                <link rel="stylesheet" href="http://localhost/My_APPS/bookcollection/assets/style/style.css" type="text/css"/>
		<script type="text/javascript" src="http://localhost/My_APPS/bookcollection/assets/javascript/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/My_APPS/bookcollection/assets/javascript/javascript_lib.js"></script>
                
                <!-- Including JQUERY artifacts -->
<!--                <script type="text/javascript" src="../../../../jquery-ui-1.10.4/jquery-1.10.2.js"></script> 
                <script type="text/javascript" src="../../../../jquery-ui-1.10.4/ui/jquery-ui.js"></script> 
                <link rel="stylesheet" href="../../../../jquery-ui-1.10.4/themes/base/jquery-ui.css"/>
-->
               <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
               <script src="//code.jquery.com/jquery-1.9.1.js"></script>
               <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
               <link rel="stylesheet" href="/resources/demos/style.css">
	</head>
	
	<body>
		<div id="wrapper">
		
			<!-- masthead -->
			<div id="masthead">
				<span class="masthead_title">My Book Collection</span>
				
				<div id="masthead_menu">
					<a href="index.php">Home</a> | <a href="index.php?cmd=home/add">Add Book</a> |<a href="index.php?cmd=home/categories">Categories</a> | <a href="index.php?cmd=home/about">About</a>
				</div>
			</div>
                        