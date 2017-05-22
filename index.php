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

	<div class="container">
		<center><h1>Braintree PHP Integration</h1></center>

		<section class="menu">
			<section class="menu-box">
				<center><h4>Navigation</h4></center>
				<ul class="nav-links">
					<li><a href="index.php">Create a Transaction</a></li>
					<li><a href="void/index.php">Void a Transaction</a></li>
					<li><a href="refund/index.php">Issue a Refund</a></li>
          <li><a href="submerchant/index.php">Create a Sub-merchant</a></li>
					<li><a href="marketplace/index.php">Marketplace Transaction</a></li>
					<li><a href="subscription/index.php">Create a Subscription</a></li>
				</ul>
			</section>

			<section class="menu-box test-values">
				<center><h4>Test Values</h4></center>
				<center><h5>Valid Card Numbers</h5></center>
				<ul class="test-cards">
					<li>Amex: 3782 822463 10005</li>
					<li>JCB: 3530 1113 3330 0000</a></li>
					<li>MC: 5555 5555 5555 4444</a></li>
					<li>V: 4111 1111 1111 1111</a></li>
					<li>D: 6011 1111 1111 1117</a></li>
				</ul>
				<center><h5>Fraud</h5></center>
				<ul class="test-cards">
					<li>V: 4000 1111 1111 1511</a></li>
				</ul>
				<br>
				<center><h5><a href="#">More Test Values</a></h5></center>
			</section>
		</section>

		<section class="form-wrapper">
			<form id="form" method="post" action="checkout.php">
				<h3>Drop-In v3 Transaction <span class="tagline">(want <a href="hosted_fields/index.php">Hosted Fields?</a>)<span></h3>
				<div class="dropin-customer-data">
					<div class="row">
						<div class="col-xs-3 field-box">
							<label for="amount">Amount</label>
							<input class="dropin-form-field" type="text" name="amount" value="<?php echo $amount;?>">
						</div>
						<div class="col-xs-3 field-box">
							<label for="email">Email</label>
							<input class="dropin-form-field" type="text" name="email" value="<?php echo $email;?>">
						</div>
						<div class="col-xs-3 field-box">
							<label for="first">First</label>
							<input class="dropin-form-field" type="text" name="first-name" value="<?php echo $firstName;?>">
						</div>
						<div class="col-xs-3 field-box">
							<label for="last">Last</label>
							<input class="dropin-form-field" type="text" name="last-name" value="<?php echo $lastName;?>">
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4 field-box">
							<label for="streetAddress">Street Address</label>
							<input class="dropin-form-field" type="text" name="street-address" value="<?php echo $streetAddress;?>">
						</div>
						<div class="col-xs-4 field-box">
							<label for="city">City</label>
							<input class="dropin-form-field" type="text" name="city" value="<?php echo $city;?>">
						</div>
						<div class="col-xs-4 field-box">
							<label for="state">State</label>
							<input class="dropin-form-field" type="text" name="state" value="<?php echo $state;?>">
						</div>
					</div>
				</div>

				<div id="dropin"></div>

				<div class="options">
					<div class="row">
						<label class="options-label" for="country">Country:</label>
						<select id="country" name="country">
							<option value="US">US</option>
							<option value="GB">UK</option>
							<option value="FR">FR</option>
							<option value="AU">AU</option>
							<option value="JP">JP</option>
						</select>
						<label class="options-label" for="submit-for-settlement">Submit for Settlement: <input id="submit-for-settlement" name="submitForSettlement" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="vault">Store in Vault on Success: <input id="vault" name="vault" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
					</div>
					<div class="row">
						<label class="options-label" for="skip-atf">Skip Advanced Fraud Tools: <input id="skip-atf" name="skipAtf" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="skip-avs">Skip AVS Rules: <input id="skip-avs" name="skipAvs" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="skip-cvv">Skip CVV Rules: <input id="skip-cvv" name="skipCvv" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
					</div>
				</div>

				<input type="hidden" name="nonce">
				<input class="btn btn-success" id="submit-button" type="submit" value="Checkout">
			</form>
	</section>

	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://js.braintreegateway.com/web/dropin/1.0.2/js/dropin.min.js"></script>
	<script src="https://js.braintreegateway.com/web/3.15.0/js/data-collector.min.js"></script>
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
