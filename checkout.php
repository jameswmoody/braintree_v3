<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require 'lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	$nonce = $_POST['nonce'];
	$email = $_POST["email"];
	$amount = $_POST["amount"];

// Merchant Account Selection
 if ($_POST["country"] == "US")
	$merchantAccountId = 'myphpcompany';
else
	$merchantAccountId = 'myphpcompany_EUR';

// API Call

 $result = Braintree_Transaction::sale([
	'amount' => $amount,
    'merchantAccountId' => $merchantAccountId,
    'paymentMethodNonce' => $nonce,
    'descriptor' => [
    	'name' => 'company*My PHP',
    	'phone' => '2482272481',
    	'url' => 'company.com',
    ],
   	'customer' => [
    	'email' => $email,
  		],
  	'options' => [
    	'submitForSettlement' => True,
    ],
 	'billing' => [
		'countryCodeAlpha2' => "US",
  	],
]);

// Result

 if ($result->success)
	echo("Sucess! Transaction ID is " . $result->transaction->id . ". Amount " . $result->transaction->amount . " has been " . $result->transaction->status . ".");
else
	echo($result->message);
echo (" Refreshing...");

?>
