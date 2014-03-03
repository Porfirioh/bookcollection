<?php require_once(dirname(__FILE__).'/../../lib/BookDao.php'); ?>

        <h1>Add Book Form</h1>
            <!-- FORM FOR DATA ENTRY -->
		<table>
			<tr>
				<td><b>Title: </b></td>
				<td><input type="text" name="title" size="30" id="title" onMouseOver="changeColor('title');" onMouseOut="changeColorAgain('title');" /></td>
				<td><span id="nameErrorMsg" style="color: red; "></span></td>
			</tr>
			<tr>
				<td><b>ISBN: </b></td>
				<td><input type="text" name="isbn" size="30" id="isbn" onMouseOver="changeColor('isbn');" onMouseOut="changeColorAgain('isbn');"/></td>
				<td><span id="titleErrorMsg" style="color: red; "></span></td>
			</tr>
			<tr>
				<td><b>Author: </b></td>
				<td><input type="text" name="author" size="30" id="author" onMouseOver="changeColor('author');" onMouseOut="changeColorAgain('author');"/></td>
				<td><span id="authorErrorMsg" style="color: red; "></span></td>
			</tr>
                        <tr>
				<td><b>Category: </b></td>
                                <td>
                                    <select name="category" id="category">
                                        <option value="0">(Please Select A Category)</option>
                                        <option value="1">Web Development</option>
                                        <option value="2">Networking</option>
                                        <option value="3">Math</option>
                                        <option value="4">Programming</option>
                                    </select>
                                </td>
				<td><span id="categoryErrorMsg" style="color: red; "></span></td>
			</tr>
			<tr>
				<td><b>Description: </b></td>
				<td><textarea name="description" cols="30" rows="5" id="description" onMouseOver="changeColor('description');" onMouseOut="changeColorAgain('description');"></textarea></td>
				<td><span id="descriptionErrorMsg" style="color: red; "></span></td>
			</tr>
			<tr>
				<td><b>Price: </b></td>
				<td><input type="text" name="price" size="5" id="price" onMouseOver="changeColor('price');" onMouseOut="changeColorAgain('price');"/></td>
				<td><span id="priceErrorMsg" style="color: red; "></span></td>
			</tr>
			<tr>
                            <td><input type="hidden" name="cmd" value="home/addBook"/></td>
                            <td><input type="submit" value="Add Book" id="addBookBt" /><!--onClick="validate()"--> </td>
			</tr>
		</table>
            <!-- END OF DATA ENTRY FORM -->
            
        <!-- DIV USED TO DISPLAY THE STATUS UPDATE WHEN ADDING BOOKS TO DB -->
        <span id="status" style=" font-size: 1.5em; color:green;  "></span>
        
        <!-- DISPLAYS THE DIALOG BOX USED TO EDIT BOOKS! -->
        <div id="dialog" style="display:none;" title="Book Edit Form">
            <table>
                <tr>
                    <td><b>Title: </b></td>
                    <td><input type="text" name="title" size="30" id="title" onMouseOver="changeColor('title');" onMouseOut="changeColorAgain('title');" /></td>
                    <td><span id="nameErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><b>ISBN: </b></td>
                    <td><input type="text" name="isbn" size="30" id="isbn" onMouseOver="changeColor('isbn');" onMouseOut="changeColorAgain('isbn');"/></td>
                    <td><span id="titleErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><b>Author: </b></td>
                    <td><input type="text" name="author" size="30" id="author" onMouseOver="changeColor('author');" onMouseOut="changeColorAgain('author');"/></td>
                    <td><span id="authorErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><b>Category: </b></td>
                    <td>
                        <select name="category" id="category">
                            <option value="0">(Please Select A Category)</option>
                            <option value="1">Web Development</option>
                            <option value="2">Networking</option>
                            <option value="3">Math</option>
                            <option value="4">Programming</option>
                        </select>
                    </td>
                    <td><span id="categoryErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><b>Description: </b></td>
                    <td><textarea name="description" cols="30" rows="5" id="description" onMouseOver="changeColor('description');" onMouseOut="changeColorAgain('description');"></textarea></td>
                    <td><span id="descriptionErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><b>Price: </b></td>
                    <td><input type="text" name="price" size="5" id="price" onMouseOver="changeColor('price');" onMouseOut="changeColorAgain('price');"/></td>
                    <td><span id="priceErrorMsg" style="color: red; "></span></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="cmd" value="home/addBook"/></td>
                    <td><input type="submit" value="Add Book" id="addBookBt" /><!--onClick="validate()"--> </td>
                </tr>
            </table>
        </div>
        <!-- END OF DIALOGUSED TO DISPLAY BOOK EDIT FORM -->
        
        <!-- PHP CODE USED TO DISPLAYS BOOKS IN A TABLE -->
        <?php 
            BookDao::printTable($books);
        ?>
        
        <script type="text/javascript">
            
            var test = true;
            
            if (test)
                // Set global variable used to refer to the URL to the WEBSITE INDEX PAGE
                window.WEB_INDEX = 'http://localhost:8000/index.php';
            else
                window.WEB_INDEX = 'http://damanc-projects.webuda.com/bookcollection/index.php';
        
            function editBookForm(value) {
                
                (function() {
                    $.getJSON(window.WEB_INDEX + '?cmd=home/getBook', {id: value}, function(data){
                        //alert ('Data Fetched: ' + data.name);
                        $('#dialog #title').val(data.title);
                        $('#dialog #isbn').val(data.isbn);
                        $('#dialog #author').val(data.author);
                        $('#dialog #description').val(data.description);
                        $('#dialog #price').val(data.price);
                    });

                    $("#dialog").dialog({
                        position: 'top',
                        modal: true,
                        resizable: false,
                        width: 500,
                        buttons: {
                                "Save": function() {
                                    // code to add book to database
                                },
                                "Close": function() {
                                        $(this).dialog("close");
                                }
                        }
                    });
                })();
            }
            
            $(document).ready(function() {

                    $("#addBookBt").bind('click', function() {
                    
                    // Validate Form -- Make sure text fields are all filled in
                    // Basic validation, ensures none of the form fields are blank
                        var fields = ["title", "isbn", "author", "description", "price"];
                        for (var f in fields) {
                            var value = $("#"+fields[f]).val();
                            if (value.length == 0)
                                return false;
                        }
                        
                        $.post(window.WEB_INDEX + "?cmd=home/addBook", 
                            {title: $("#title").val(), isbn: $("#isbn").val(), author: $("#author").val(),
                                 description: $("#description").val(), price: $("#price").val(), category: $("#category").val()},
                              function($data) {
                                jQuery('#status').show();
                                $("#status").text("Book Successfully added!");
                                 setTimeout( "jQuery('#status').hide();",3000 );
                                });
                            return false;
                        });
            });
            
</script>
