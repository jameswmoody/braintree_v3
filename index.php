<html>
	<head>
		<?php
			ini_set('display_errors',1);
			error_reporting(1);
			require_once 'lib/braintree.php';

			Braintree_Configuration::environment('sandbox');
			Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
			Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
			Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

			$clientToken = Braintree_ClientToken::generate();
		?>
		<title>Drop In v3</title>
	</head>
	<body>
	<div id="body-container">
		<div>
			<form id="payment-form" method="post" action="checkout.php">
				<input type="text" name="amount" placeholder="Amount" value="<?php echo $amount;?>">
				<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
				<input class="form-field" type="text" name="firstName" placeholder="First" value="<?php echo $firstName;?>">
				<input class="form-field" type="text" name="lastName" placeholder="Last" value="<?php echo $lastName;?>">
				<input class="form-field" type="text" name="streetAddress" placeholder="Street Address" value="<?php echo $streetAddress;?>">
				<input class="form-field" type="text" name="city" placeholder="City" value="<?php echo $city;?>">
				<input class="form-field" type="text" name="state" placeholder="State/Province" value="<?php echo $state;?>">
				<div id="dropin"></div>
				<input type="hidden" name="nonce">
				<input class="button fade-in" id="submit-button" type="submit" value="Give Me Money"><br><br>
				<select id="country" input name="country">
          			<option value="US">US</option>
          			<option value="GB">UK</option>
       	</select>
			</form>
		</div>
	</div>

	<script src="https://js.braintreegateway.com/web/dropin/1.0.2/js/dropin.min.js"></script>
	<script>
  	const submitButton = document.querySelector('#submit-button');
  	const form = document.querySelector('#payment-form');

  	// disable to submit button to prevent submission before payment fields available
  	submitButton.disabled = true;

  	braintree.dropin.create({
    	authorization: '<?php echo $clientToken ?>',
    	selector: '#dropin',
  	}, (err, dropinInstance) => {
    	if (err) {
      	console.error(err);
      	return;
    	} else {
      	// enable submit button
      	submitButton.disabled = false;
      	submitButton.addEventListener('click', (event) => {
        	// prevent the form's default behavior
        	event.preventDefault();
        	dropinInstance.requestPaymentMethod( (err, payload) => {
          	if (err) {
            	console.error(err);
          	} else {
            	console.log(payload);
            	// inject the nonce into the form
            	form.querySelector('input[name="nonce"]').value = payload.nonce;
            	//finally, submit the form
            	form.submit();
          	}
        	});
      	});
			 }
  	 });
	</script>
	</body>
</html>
