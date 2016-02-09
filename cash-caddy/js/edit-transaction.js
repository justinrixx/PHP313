function validateForm() {
	valid = true;
	if ($('#transaction_date').val() == "") {
		Materialize.toast('Please enter a valid date for this transaction', 3000);
		valid = false;
	}
	if ($('#amount').val() == "") {
		Materialize.toast('Please enter a valid amount for this transaction', 3000);
		valid = false;
	}
	return valid;
}