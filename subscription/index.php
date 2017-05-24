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
    <title>Subscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
					<li><a href="/subscription/index.php">Create a Subscription</a></li>
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
      <form id="form" method="post">
        <h3>Create a Subscription</h3>

        <div class="customer-details">
          <div class="row">
              <h3>Customer ID: 206084564</h3>
          </div>
          <div class="contatiner">
            <center>
              <h4>Choose a Payment Method</h4>
              <div class="row">

                <div class="col-xs-3">
                  <label for="payment-method-visa">
                    <i class="fa fa-cc-visa fa-3x" aria-hidden="true"></i>
                    <p>Visa 1111</p>
                  </label>
                  <br>
                  <input type="radio" id="payment-method-visa" name="payment-method" value="visa">
                </div>

                <div class="col-xs-3">
                  <label for="payment-method-mc">
                    <i class="fa fa-cc-mastercard fa-3x" aria-hidden="true"></i>
                    <p>Mastercard 4444</p>
                  </label>
                  <br>
                  <input type="radio" id="payment-method-mc" name="payment-method" value="mastercard">
                </div>

                <div class="col-xs-3">
                  <label for="payment-method-amex">
                    <i class="fa fa-cc-amex fa-3x" aria-hidden="true"></i>
                    <p>Amex 0005</p>
                  </label>
                  <br>
                  <input type="radio" id="payment-method-amex" name="payment-method" value="amex">
                </div>

                <div class="col-xs-3">
                  <label for="payment-method-dc">
                    <i class="fa fa-cc-discover fa-3x" aria-hidden="true"></i>
                    <p>Discover 1117</p>
                  </label>
                  <br>
                  <input type="radio" id="payment-method-dc" name="payment-method" value="discover">
                </div>

              </div>
            </center>
          </div>
        </div>

        <section id="plans">
                <div class="row">

                    <div class="col-md-4 text-center plans">
                        <div class="panel panel-default panel-pricing">
                            <div class="panel-heading">
                                <h3>Good Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>$15 / Month</strong></p>
                            </div>
                            <ul class="list-group text-center">
                              <li class="list-group-item">
                                <input type="checkbox" id="trial" name="trial" value="true">
                                Free Trial
                                <select class="cycles trial-cyles" name="trial-cyles-good">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="add-on" name="add-on" value="true">
                                $10 Add-on
                                <select class="cycles add-on-cyles" name="add-on-cyles-good">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="discount" name="discount" value="true">
                                $5 Discount
                                <select class="cycles discount-cyles" name="discount-cyles-good">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                            </ul>
                            <div class="panel-footer">
                              <input class="btn btn-lg btn-block btn-default" id="submit-button" onclick="submitForm('subscription_good_plan.php')" type="submit" value="Buy"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center plans">
                        <div class="panel panel-info panel-pricing">
                            <div class="panel-heading">
                                <h3>Better Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>$30 / Month</strong></p>
                            </div>
                            <ul class="list-group text-center">
                              <li class="list-group-item">
                                <input type="checkbox" id="trial" name="trial" value="true">
                                Free Trial
                                <select class="cycles trial-cyles" name="trial-cyles-better">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="add-on" name="add-on" value="true">
                                $10 Add-on
                                <select class="cycles add-on-cyles" name="add-on-cyles-better">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="discount" name="discount" value="true">
                                $5 Discount
                                <select class="cycles discount-cyles" name="discount-cyles-better">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                            </ul>
                            <div class="panel-footer">
                              <input class="btn btn-lg btn-block btn-info" id="submit-button" onclick="submitForm('subscription_better_plan.php')" type="submit" value="Buy"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center plans">
                        <div class="panel panel-primary panel-pricing">
                            <div class="panel-heading">
                                <h3>Best Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p><strong>$300 / Year</strong></p>
                            </div>
                            <ul class="list-group text-center">
                              <li class="list-group-item">
                                <input type="checkbox" id="trial" name="trial" value="true">
                                Free Trial
                                <select class="cycles trial-cyles" name="trial-cyles-best">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="add-on" name="add-on" value="true">
                                $10 Add-on
                                <select class="cycles add-on-cyles" name="add-on-cyles-best">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                              <li class="list-group-item">
                                <input type="checkbox" id="discount" name="discount" value="true">
                                $5 Discount
                                <select class="cycles discount-cyles" name="discount-cyles-best">
                                   <option>Cycles</option>
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12 ">12</option>
                                </select>
                              </li>
                            </ul>
                            <div class="panel-footer">
                              <input class="btn btn-lg btn-block btn-primary" id="submit-button" onclick="submitForm('subscription_best_plan.php')" type="submit" value="Buy"/>
                            </div>
                        </div>
                    </div>

                </div>
        </section>

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
      function submitForm(action) {
        var form = document.getElementById('form');
        form.action = action;
        form.submit();
      }
    </script>
  </body>
</html>
