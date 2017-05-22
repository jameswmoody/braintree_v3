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
    <title>Marketplace</title>
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
      <form action="marketplace.php" id="form" method="post">
        <h3>Marketplace Transaction</h3>
        <div class="row">
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="first-name" placeholder="First" value="<?php echo $firstName;?>">
          </div>
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="last-name" placeholder="Last" value="<?php echo $lastName;?>">
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
            <div id="postal-code" class="hosted-field"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="amount" placeholder="Amount" value="<?php echo $amount;?>">
          </div>
          <div class="col-xs-4 field-box">
            <input class="form-field" type="text" name="service-fee" placeholder="Service Fee" value="<?php echo $serviceFee;?>">
          </div>
        </div>

        <div class="cardinfo-wrapper row">
          <div class="cardinfo-number col-xs-4 field-box">
            <div id="card-number" class="hosted-field"></div>
          </div>
          <div class="cardinfo-cvv col-xs-4 field-box">
            <div id="cvv" class="hosted-field"></div>
          </div>
          <div class="cardinfo-exp-date col-xs-4 field-box">
            <div id="expiration-date" class="hosted-field"></div>
          </div>
        </div>

        <div class="options hf-options">
					<div class="row">
						<label class="options-label" for="country">Sub-merchant:
              <select id="merchant-account-id" name="merchant-account-id" value="<?php echo $merchantAccountId;?>">
                <option value="Marvin_Gaye_instant">Trouble Man Inc</option>
                <option value="Isaac_Hayes_instant">Soulsville USA</option>
                <option value="John_Doe_instant">Doe &amp; Doe, LLC</option>
                <option value="myphpcompany">Master Merchant</option>
              </select>
            </label>
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
        <input type="hidden" name="device-data">
        <input class="btn btn-success" id="submit-button" type="submit" value="Checkout" />
      </form>
    </section>
  </div>

    <script src="https://js.braintreegateway.com/web/3.15.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.15.0/js/hosted-fields.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.15.0/js/data-collector.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript">
      $('#skip-atf').bootstrapToggle('off')
      $('#skip-avs').bootstrapToggle('off')
      $('#skip-cvv').bootstrapToggle('off')
    </script>
    <script>
      var form = document.querySelector('#form');
      var submit = document.querySelector('input[type="submit"]');

      braintree.client.create({
        authorization: '<?php echo $clientToken ?>'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }

        braintree.dataCollector.create({
          client: clientInstance,
          kount: true
        }, function (err, dataCollectorInstance) {
          if (err) {
            console.error(err);
            return;
          }
          form.querySelector('input[name="device-data"]').value = dataCollectorInstance.deviceData;
        });

        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px',
              'color': '#3A3A3A',
              'font-family': 'Courier New, Courier, monospace'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            },
            '.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '•••• •••• •••• ••••'
            },
            cvv: {
              selector: '#cvv',
              placeholder: 'CVV'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: 'MM/YYYY'
            },
            postalCode: {
              selector: '#postal-code',
              placeholder: '11111'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
          }

          submit.removeAttribute('disabled');

          form.addEventListener('submit', function (event) {
            event.preventDefault();

            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
              if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
              }
              form.querySelector('input[name="nonce"]').value = payload.nonce;
              form.submit();
            });
          }, false);
        });
      });
    </script>
  </body>
</html>
