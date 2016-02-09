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
	if ($('#password2').val() == "") {
		Materialize.toast('Please enter your password twice', 3000);
		valid = false;
	}
	if ($('#password').val() != $('#password').val()) {
		Materialize.toast('The two passwords do not match.');
		valid = false;
	}

	return valid;
}