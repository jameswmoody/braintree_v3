<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      ini_set('display_errors', 1);
      error_reporting(1);
      require_once '../lib/braintree.php';

      Braintree_Configuration::environment('sandbox');
      Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
      Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
      Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

      $clientToken = Braintree_ClientToken::generate();
    ?>
    <meta charset="UTF-8">
    <title>Create a Sub-merchant</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
  </head>
  <body>

  <div class="container">

    <center><h1>Braintree PHP Integration</h1></center>

    <section class="menu">
			<section class="menu-box">
				<center><h4>Navigation</h4></center>
				<ul class="nav-links">
          <li><a href="../index.php">Create a Transaction</a></li>
					<li><a href="../void/index.php">Void a Transaction</a></li>
					<li><a href="../refund/index.php">Issue a Refund</a></li>
					<li><a href="../submerchant/index.php">Create a Sub-merchant</a></li>
					<li><a href="../marketplace/index.php">Marketplace Transaction</a></li>
					<li><a href="../subscription/index.php">Create a Subscription</a></li>
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
      <form action="submerchant.php" id="form" method="post">
        <h3>Create a Sub-merchant</h3>
        <div class="row">
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="first-name" placeholder="First" value="<?php echo $firstName;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="last-name" placeholder="Last" value="<?php echo $lastName;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="date-of-birth" placeholder="DOB" value="<?php echo $dateOfBirth;?>">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
          </div>
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="phone" placeholder="Phone" value="<?php echo $phone;?>">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3 field-box">
            <input class="form-field" type="text" name="city" placeholder="City" value="<?php echo $city;?>">
          </div>
          <div class="col-xs-3 field-box">
            <input class="form-field" type="text" name="state" placeholder="State/Province" value="<?php echo $state;?>">
          </div>
          <div class="col-xs-3 field-box">
            <input class="form-field" type="text" name="street-address" placeholder="Street Address" value="<?php echo $streetAddress;?>">
          </div>
          <div class="col-xs-3 field-box">
            <input class="form-field" type="text" name="postal-code" placeholder="Postal Code" value="<?php echo $postalCode;?>">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="busines-name" placeholder="Business Name" value="<?php echo $businesName;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="account-number" placeholder="Bank Account Number" value="<?php echo $accountNumber;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="routing-number" placeholder="Routing Number" value="<?php echo $routingNumber;?>">
          </div>
        </div>

        <div class="options hf-options">
					<div class="row">
						<label class="options-label" for="tos-accepted">Do you accept the Terms of Service? <input id="tos-accepted" name="tos-accepted" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
					</div>
				</div>
        <input class="btn btn-primary" id="submit-button" type="submit" value="Submit" />
      </form>
    </section>
  </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript">
      $('#skip-atf').bootstrapToggle('off')
      $('#skip-avs').bootstrapToggle('off')
      $('#skip-cvv').bootstrapToggle('off')
    </script>
  </body>
</html>
