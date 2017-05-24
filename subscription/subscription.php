<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require '../lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

  $nonce = $_POST['nonce'];
  $token = "dmy2gy";
  $deviceData = $_POST["device-data"];
  $firstName = $_POST["first-name"];
  $lastName = $_POST["last-name"];
  $email = $_POST["email"];
  $streetAddress = $_POST["street-address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $country = $_POST["country"];

// Plan Selection

  echo ($_POST["submit_1"]);

// // Merchant Account Selection
//
//   if ($country == "US") {
//     $merchantAccountId = 'myphpcompany';
//   } elseif ($country == "UK") {
//     $merchantAccountId = 'myphpcompany_GBP';
//   } elseif ($country == "FR") {
//     $merchantAccountId = 'myphpcompany_EUR';
//   } elseif ($country == "AU") {
//     $merchantAccountId = 'myphpcompany_AUD';
//   } elseif ($country == "JP") {
//     $merchantAccountId = 'myphpcompany_JPY';
//   } else {
//     $merchantAccountId = 'myphpcompany';

// API Call
  $result = Braintree_Subscription::create([
    'paymentMethodToken' => $token,
    'planId' => $planId,
    'merchantAccountId' => $merchantAccountId
  ]);

// Result
  if ($result->success) {
    echo "Success! Transaction ID " . " was refunded.";
  }
  else {
    echo "Something went wrong.";
  }
  echo (" Refreshing...");
?>
