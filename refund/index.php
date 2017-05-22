<html>
	<head>
		<?php
			ini_set('display_errors',1);
			error_reporting(1);
			require_once '../lib/braintree.php';

			Braintree_Configuration::environment('sandbox');
			Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
			Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
			Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

			$clientToken = Braintree_ClientToken::generate();
		?>
		<title>Refund</title>
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
					<li><a href="index.php">Issue a Refund</a></li>
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
			<form id="form" method="post" action="refund.php">
      <h3>Refund</h3>
        <div class="row">
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="txn-id" placeholder="Transaction ID" value="<?php echo $txnId;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="amount" placeholder="Amount" value="<?php echo $amount;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="order-id" placeholder="Order ID (optional)" value="<?php echo $orderId;?>">
          </div>
        </div>
        <br>
				<input class="btn btn-danger" id="submit-button" type="submit" value="Refund">
			</form>
	</section>

	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
