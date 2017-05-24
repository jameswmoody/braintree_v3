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
    <title>Hosted Fields v3</title>
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
        <center><h5><a href="#" data-toggle="modal" data-target="#modal">More Test Values</a></h5></center>
			</section>
		</section>

		<div id="modal" class="modal fade bd-example-modal-lg" role="dialog">
  		<div class="modal-dialog modal-lg">
    		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h3 class="modal-title">Test Values</h3>
      		</div>
      		<div class="modal-body">
							<div class="row modal-row">
								<div class="col-md-6 modal-col">
        					<h4>Card Numbers</h4>
									<table>
										<tr>
											<th>Card Value</th>
											<th>Card Type</th>
										</tr>
										<tr>
											<td>3782 822463 10005</td>
											<td>American Express</td>
										</tr>
										<tr>
											<td>371 4496353 98431	</td>
											<td>American Express</td>
										</tr>
										<tr>
											<td>6011 1111 1111 1117</td>
											<td>Discover</td>
										</tr>
										<tr>
											<td>3530 1113 3330 0000</td>
											<td>JCB</td>
										</tr>
										<tr>
											<td>6304 0000 0000 0000</td>
											<td>Maestro</td>
										</tr>
										<tr>
											<td>5555 5555 5555 4444</td>
											<td>Mastercard</td>
										</tr>
										<tr>
											<td>2223 0000 4840 0011</td>
											<td>Mastercard</td>
										</tr>
										<tr>
											<td>4111 1111 1111 1111</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4005 5192 0000 0004</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4009 3488 8888 1881</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0026</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4012 0000 7777 7777</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4012 8888 8888 1881</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4217 6511 1111 1119</td>
											<td>Visa</td>
										</tr>
										<tr>
											<td>4500 6000 0000 0061</td>
											<td>Visa</td>
										</tr>
									</table>
								</div>
								<div class="col-md-6 modal-col">
									<h4>Card type indicators</h4>
									<table>
										<tr>
											<th>Card Value</th>
											<th>Card Information</th>
										</tr>
										<tr>
											<td>4500 6000 0000 0061</td>
											<td>prepaid = "Yes"</td>
										</tr>
										<tr>
											<td>4009 0400 0000 0009</td>
											<td>commercial = "Yes"</td>
										</tr>
										<tr>
											<td>4005 5192 0000 0004</td>
											<td>Durbin regulated = "Yes"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0026</td>
											<td>healthcare = "Yes</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0125</td>
											<td>debit = "Yes"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0224</td>
											<td>payroll = "Yes"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0422</td>
											<td>all values = "No"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0323</td>
											<td>all values = "Unknown"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0620</td>
											<td>country of issuance = "USA"</td>
										</tr>
										<tr>
											<td>4012 0000 3333 0521</td>
											<td>issuing bank ="NETWORK ONLY"</td>
										</tr>
									</table>

									<br>

                  <h4>Sub-merchant Onboarding</h4>
									<table>
										<tr>
											<th>Routing Numbers</th>
										</tr>
										<tr>
											<td>071101307</td>
										</tr>
										<tr>
											<td>071000013</td>
										</tr>
									</table>

								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-md-12">
									<h4>AVS &amp; CVV</h4>
									<table>
										<tr>
											<th>Type</th>
											<th>Test Value</th>
											<th>Status</th>
											<th>Reason</th>
										</tr>
										<tr>
											<td>Visa</td>
											<td>4000 1111 1111 1511</td>
											<td>gateway_rejected</td>
											<td>fraud</td>
										</tr>
										<tr>
											<td>CVV</td>
											<td>200 (Amex 2000)</td>
											<td>N (does not match)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>CVV</td>
											<td>201 (Amex 2011)</td>
											<td>U (not verified)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>CVV</td>
											<td>301 (Amex 3011)</td>
											<td>S (issuer does not participate)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Postal Error</td>
											<td>30000</td>
											<td>E (AVS system error)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Postal Error</td>
											<td>30001</td>
											<td>S (issuing bank does not support AVS)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Postal Code</td>
											<td>20000</td>
											<td>N (does not match)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Postal Code</td>
											<td>20001</td>
											<td>U (not verified)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Street Address</td>
											<td>starts with 200</td>
											<td>N (does not match)</td>
											<td>Not Fraud</td>
										</tr>
										<tr>
											<td>AVS - Street Address</td>
											<td>starts with 201</td>
											<td>U (not verified)</td>
											<td>Not Fraud</td>
										</tr>
									</table>
								</div>
							</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    		</div>
  		</div>
		</div>

    <section class="form-wrapper">
      <form action="../checkout.php" id="form" method="post">
        <h3>Hosted Fields v3 Transaction <span class="tagline">(want <a href="../index.php">the Drop-In?</a>)</span></h3>
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
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
          </div>
          <div class="col-xs-6 field-box">
            <input class="form-field" type="text" name="amount" placeholder="Amount" value="<?php echo $amount;?>">
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
						<label class="options-label" for="country">Country:
						  <select id="country" name="country">
							  <option value="US">US</option>
							  <option value="GB">UK</option>
							  <option value="FR">FR</option>
							  <option value="AU">AU</option>
							  <option value="JP">JP</option>
						  </select>
            </label>
						<label class="options-label" for="submit-for-settlement">Submit for Settlement: <input id="submit-for-settlement" name="submit-for-settlement" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="vault">Store in Vault on Success: <input id="vault" name="vault" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
					</div>
					<div class="row">
						<label class="options-label" for="skip-atf">Skip Advanced Fraud Tools: <input id="skip-atf" name="skip-atf" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="skip-avs">Skip AVS Rules: <input id="skip-avs" name="skip-avs" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
						<label class="options-label" for="skip-cvv">Skip CVV Rules: <input id="skip-cvv" name="skip-cvv" type="checkbox" value="true" checked data-toggle="toggle" data-size="mini" data-width="50"></label>
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
