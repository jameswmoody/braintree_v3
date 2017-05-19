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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
  </head>
  <body>
    <div class="container form-wrapper">
      <form action="../checkout.php" id="form" method="post">

        <div class="row">
          <div class="col-xs-6 right-field">
            <input class="form-field" type="text" name="firstName" placeholder="First" value="<?php echo $firstName;?>">
          </div>
          <div class="col-xs-6 left-field">
            <input class="form-field" type="text" name="lastName" placeholder="Last" value="<?php echo $lastName;?>">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3 right-field">
            <input class="form-field" type="text" name="streetAddress" placeholder="Street Address" value="<?php echo $streetAddress;?>">
          </div>
          <div class="col-xs-3 center-field">
            <input class="form-field" type="text" name="city" placeholder="City" value="<?php echo $city;?>">
          </div>
          <div class="col-xs-3 center-field">
            <input class="form-field" type="text" name="state" placeholder="State/Province" value="<?php echo $state;?>">
          </div>
          <div class="col-xs-3 left-field">
            <div id="postal-code" class="hosted-field"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 right-field">
            <input class="form-field" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
          </div>
          <div class="col-xs-6 left-field">
            <input class="form-field" type="text" name="amount" placeholder="Amount" value="<?php echo $amount;?>">
          </div>
        </div>

        <div class="cardinfo-wrapper row">
          <div class="cardinfo-number col-xs-4 right-field">
            <div id="card-number" class="hosted-field"></div>
          </div>
          <div class="cardinfo-cvv col-xs-4 center-field">
            <div id="cvv" class="hosted-field"></div>
          </div>
          <div class="cardinfo-exp-date col-xs-4 left-field">
            <div id="expiration-date" class="hosted-field"></div>
          </div>
        </div>

        <select id="country" input name="country">
                <option value="US">US</option>
                <option value="GB">UK</option>
        </select>
        <br>
        <br>
        <input type="hidden" name="nonce">
        <input class="btn btn-success" type="submit" value="Checkout" />
      </form>
    </div>

    <script src="https://js.braintreegateway.com/web/3.15.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.15.0/js/hosted-fields.min.js"></script>
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
