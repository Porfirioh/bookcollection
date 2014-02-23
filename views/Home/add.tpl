<?php require_once(dirname(__FILE__).'/../../lib/BookDao.php'); ?>

        <h1>Add Book Form</h1>
	
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

        <span id="status" style=" font-size: 1.5em; color:green;  "></span>
        
        <?php 
            BookDao::printTable($books);
        ?>
        
        <script type="text/javascript">
            
            $(document).ready(function() {

                    // Validate Form -- Make sure text fields are all filled in
                    $("#title, #isbn, #author").bind('blur', function() {
                        var val = $("#title").val();
                        if (val.length == 0 || val.empty())
                            alert ('Field Cannot Be empty!');
                     });
                     
                    $("#addBookBt").bind('click', function() {
                        //var bookForm = $("form").serialize();
                        $.post("http://localhost:8000/index.php?cmd=home/addBook", 
                        {title: $("#title").val(), isbn: $("#isbn").val(), author: $("#author").val(),
                             description: $("#description").val(), price: $("#price").val()},
                          function($data) {
                            $("#status").text("Book Successfully added!");
                            
                            });
                        return false;
                    });
            });
            
</script>
