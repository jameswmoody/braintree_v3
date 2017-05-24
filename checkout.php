<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require 'lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	$nonce = $_POST['nonce'];
	$deviceData = $_POST["device-data"];
	$firstName = $_POST["first-name"];
	$lastName = $_POST["last-name"];
	$email = $_POST["email"];
	$streetAddress = $_POST["street-address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$amount = $_POST["amount"];

	// Options
	$submitForSettlement = $_POST["submit-for-settlement"];
	$vault = $_POST["vault"];
	$skipAtf = $_POST["skipAtf"];
	$skipAvs = $_POST["skipAvs"];
	$skipCvv = $_POST["skipCvv"];
	
	// Merchant Account Selection
	if ($country == "US")
		$merchantAccountId = 'myphpcompany';
	elseif ($country == "UK")
		$merchantAccountId = 'myphpcompany_GBP';
	elseif ($country == "FR")
		$merchantAccountId = 'myphpcompany_EUR';
	elseif ($country == "AU")
		$merchantAccountId = 'myphpcompany_AUD';
	elseif ($country == "JP")
		$merchantAccountId = 'myphpcompany_JPY';
	else
		$merchantAccountId = 'myphpcompany';


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
	 'deviceData' => $deviceData,
	 'customer' => [
		 'firstName' => $firstName,
		 'lastName' => $lastName,
		 'company' => 'Braintree',
		 'phone' => '555-777-9311',
		 'website' => 'http://www.example.com',
		 'email' => $email,
		 ],
	 'options' => [
		 'submitForSettlement' => $submitForSettlement,
		 'storeInVaultOnSuccess' => $vault,
		 'skipAdvancedFraudChecking' => $skipAtf,
		 'skipAvs' => $skipAvs,
		 'skipCvv' => $skipCvv
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
