function validasiLogin(form) 
{
	if (form.username.value == "") 
	{
		alert('Username harus di isi !!');
		form.username.focus();
		return (false);
	}

	if (form.password.value == "") 
	{
		alert('Password harus di isi !!');
		form.password.focus();
		return (false);
	}
	
	return (true);
}