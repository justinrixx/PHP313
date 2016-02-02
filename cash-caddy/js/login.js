function validateForm() {
	valid = true;
	if ($('#email').val() == "") {
		Materialize.toast('Please enter an email address', 3000);
		valid = false;
	}
	if ($('#password').val() == "") {
		Materialize.toast('Please enter a password', 3000);
		valid = false;
	}

	return valid;
}