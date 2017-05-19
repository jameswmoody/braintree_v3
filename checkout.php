<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require 'lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	$nonce = $_POST['nonce'];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];
	$streetAddress = $_POST["streetAddress"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$amount = $_POST["amount"];

// Merchant Account Selection
	if ($country == "US")
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
		 'phone' => '555-555-5555',
		 'url' => 'company.com',
	 ],
	 'customer' => [
		 'firstName' => $firstName,
		 'lastName' => $lastName,
		 'company' => 'Braintree',
		 'phone' => '555-777-9311',
		 'website' => 'http://www.example.com',
		 'email' => $email,
		 ],
	 'options' => [
		 'submitForSettlement' => True,
		 'storeInVaultOnSuccess' => True,
	 ],
	 'billing' => [
		 'firstName' => $firstName,
		 'lastName' => $lastName,
		 'company' => 'Braintree',
		 'streetAddress' => $streetAddress,
		 'locality' => $city,
		 'region' => $state,
		 'countryCodeAlpha2' => $country,
	 ],
]);

// Result

 if ($result->success)
	echo("Sucess! Transaction ID is " . $result->transaction->id . ". Amount " . $result->transaction->amount . " has been " . $result->transaction->status . ".");
else
	echo($result->message);
echo (" Refreshing...");

?>
