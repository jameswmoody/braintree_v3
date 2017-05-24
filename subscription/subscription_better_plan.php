<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require '../lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	// General Params
	  $params = ['planId' => '22222'];

	// Payment Method
	  $paymentMethod = $_POST['payment-method'];

	  switch ($paymentMethod) {
	    case "visa":
	        $params['paymentMethodToken'] = 'frcvkt';
	        break;
	    case "mastercard":
	        $params['paymentMethodToken'] = '92ztft';
	        break;
	    case "amex":
	        $params['paymentMethodToken'] = '4kq758';
	        break;
	    case "discover":
	        $params['paymentMethodToken'] = 'k5s3d4';
	        break;
	  }

// Trial Period
  $trial = $_POST['trial'];
	$trialCycles = $_POST['trial-cyles-better'];

// Add-ons
	$addOn = $_POST['add-on'];
	$addOnCycles = $_POST['add-on-cyles-better'];

// Discounts
  $discount = $_POST['discount'];
  $discountCycles = $_POST['discount-cyles-better'];

	if ($trial) {
		$params['trialPeriod'] = $trial;
		$params['trialDuration'] = $trialCycles;
		$params['trialDurationUnit'] = 'month';
	};

  if (isset($addOn)) {
    $params['addOns'] = ['add' => [['inheritedFromId' => 'cy3g', 'numberOfBillingCycles' => $addOnCycles]]];
  };

  if (isset($discount)) {
    $params['discounts'] = ['add' => [['inheritedFromId' => 'swfr', 'numberOfBillingCycles' => $discountCycles]]];
  };

// API Call
  $result = Braintree_Subscription::create($params);

// Result
  if ($result->success) {
    echo "Success! A new subscription was created.";
  }
  else {
    echo "Something went wrong.";
  }
  echo (" Refreshing...");
?>
