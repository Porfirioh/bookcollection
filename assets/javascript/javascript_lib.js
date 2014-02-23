function validateEmail(email) 
{
	var email = $("#email").val();
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
	if (reg.test(email))
		alert ('Valid EMAIL: ' + email);
	else
		alert ('Invalid EMAIL!!!!!!!!!!!!!!!!!!');
}

function changeColor(id) {
	document.getElementById(id).style.backgroundColor = "yellow";
}

function changeColorAgain(id) {
	document.getElementById(id).style.backgroundColor = 'white';
}