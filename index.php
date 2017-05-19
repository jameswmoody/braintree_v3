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
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
		<link rel="stylesheet" href="style/main.css">
	</head>
	<body>
	<div class="container form-wrapper">
			<form id="form" method="post" action="checkout.php">

				<div class="customer-data">
					<div class="row">
						<div class="col-xs-6 right-field">
							<label for="amount">Amount</label>
							<input class="dropin-form-field" type="text" name="amount" value="<?php echo $amount;?>">
						</div>
						<div class="col-xs-6 left-field">
							<label for="email">Email</label>
							<input class="dropin-form-field" type="text" name="email" value="<?php echo $email;?>">
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6 right-field">
							<label for="first">First</label>
							<input class="dropin-form-field" type="text" name="firstName" value="<?php echo $firstName;?>">
						</div>
						<div class="col-xs-6 left-field">
							<label for="last">Last</label>
							<input class="dropin-form-field" type="text" name="lastName" value="<?php echo $lastName;?>">
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 right-field">
							<label for="streetAddress">Street Address</label>
							<input class="dropin-form-field" type="text" name="streetAddress" value="<?php echo $streetAddress;?>">
						</div>
						<div class="col-xs-4 center-field">
							<label for="city">City</label>
							<input class="dropin-form-field" type="text" name="city" value="<?php echo $city;?>">
						</div>
						<div class="col-xs-4 left-field">
							<label for="state">State</label>
							<input class="dropin-form-field" type="text" name="state" value="<?php echo $state;?>">
						</div>
					</div>
				</div>

				<div id="dropin"></div>

				<div class="options">
					<label for="country">Country</label>
					<select id="country" input name="country">
									<option value="US">US</option>
									<option value="GB">UK</option>
					</select>
					<label for="settlement">Submit for Settlement</label>
					<input id="settlement" type="checkbox" checked data-toggle="toggle" data-style="android" data-size="small">
					<label for="vault">Store in Vault on Success</label>
					<input id="vault" type="checkbox" checked data-toggle="toggle" data-style="android" data-size="small">
					<label for="skip-atf">Skip Advanced Fraud Tools</label>
					<input id="skip-atf" type="checkbox" checked data-toggle="toggle" data-style="android" data-size="small">
					<label for="skip-avs">Skip AVS Rules</label>
					<input id="skip-avs" type="checkbox" checked data-toggle="toggle" data-style="android" data-size="small">
					<label for="skip-cvv">Skip CVV Rules</label>
					<input id="skip-cvv" type="checkbox" checked data-toggle="toggle" data-style="android" data-size="small">
				</div>

				<input type="hidden" name="nonce">
				<input class="btn btn-success" id="submit-button" type="submit" value="Checkout">
			</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://js.braintreegateway.com/web/dropin/1.0.2/js/dropin.min.js"></script>
	<script type="text/javascript">
		$('#skip-atf').bootstrapToggle('off')
		$('#skip-avs').bootstrapToggle('off')
		$('#skip-cvv').bootstrapToggle('off')
	</script>
	<script>
  	const submitButton = document.querySelector('#submit-button');
  	const form = document.querySelector('#form');

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
