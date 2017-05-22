<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require '../lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	$firstName = $_POST["first-name"];
	$lastName = $_POST["last-name"];
	$email = $_POST["email"];
	$streetAddress = $_POST["street-address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
  $postalCode = $_POST["postal-code"];
	$country = "US";
  $phone = $_POST["phone"];
  $dateOfBirth = $_POST["date-of-birth"];
  $businesName = $_POST["busines-name"];
  $accountNumber = $_POST["account-number"];
  $routingNumber = $_POST["routing-number"];
  $tosAccepted = $_POST["tos-accepted"];

// Options




// API Call

  $merchantAccountParams = [
    'individual' => [
      'firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'phone' => $phone,
      'dateOfBirth' => $dateOfBirth,
      'ssn' => $ssn,
      'address' => [
        'streetAddress' => $streetAddress,
        'locality' => $city,
        'region' => $state,
        'postalCode' => $postalCode
      ]
    ],
    'business' => [
      'dbaName' => $dbaName,
      'address' => [
        'streetAddress' => $streetAddress,
        'locality' => $city,
        'region' => $state,
        'postalCode' => $zip
      ]
    ],
    'funding' => [
      'descriptor' => $dbaName . $phone,
      'destination' => Braintree_MerchantAccount::FUNDING_DESTINATION_BANK,
      'email' => $email,
      'mobilePhone' => $phone,
      'accountNumber' => $accountNumber,
      'routingNumber' => $routingNumber
    ],
    'tosAccepted' => true,
    'masterMerchantAccountId' => "myphpcompany",
    'id' => $firstName . "_" . $lastName . "_instant"
  ];

  $result = Braintree_MerchantAccount::create($merchantAccountParams);

// Result

  if ($result->success)
    echo "Success! Submerchant is " . $firstName . "_" . $lastName . "_instant. ";
  else
    echo "Something went wrong";
    echo ("Refreshing...");

?>
