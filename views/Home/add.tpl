	<h1>Add Book Form</h1>
	
	<form method="POST" name="bookForm">
		<table>
			<tr>
				<td><b>Title: </b></td>
				<td><input type="text" name="title" size="30" id="title" onMouseOver="changeColor('title');" onMouseOut="changeColorAgain('title');"/></td>
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
	</form>
        
        <span id="status" style="display: none; font-size: 1.5em; color:green; border:1px solid black; ">Book successfully inserted</span>
        
        <script type="text/javascript">
            /*
            $(document).ready(function() {

                    // Validate Form -- Make sure text fields are all filled in
                    $("#addBookBt").bind('click', function() {
                        var bookForm = $("form").serialize();
                        $.post("http://localhost/my_apps/bookcollection/index.php?cmd=home/addBook", bookForm, function($data) {
                            $("#status").text("Book Successfully added!");
                        });

                        //alert (bookForm);
                        //return false;
                    });

                    function validateForm() 
                    {
                        passValidation = true;
                        for (var i = 0; i < document.bookForm.elements.length; i++)
                            if (document.bookForm.elements[i].value == '') {
                                    alert (document.bookForm.elements[i].name.toUpperCase() + " Must be Filled Out!");
                                    passValidation = false;
                            }
                        return passValidation;
                    }

            });
            */
</script>
