function validateForm() {
	valid = true;
	if ($('#category_name').val() == "") {
		Materialize.toast('Please enter a name for this category', 3000);
		valid = false;
	}
	if ($('#amount').val() == "") {
		Materialize.toast('Please enter a valid amount for this category', 3000);
		valid = false;
	}
	if ($('#next_refresh').val() == "") {
		Materialize.toast('Please enter a valid starting date for this category', 3000);
		valid = false;
	}

	return valid;
}