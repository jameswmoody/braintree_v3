<?php
	ini_set('display_errors',1);
	error_reporting(1);
	require '../lib/braintree.php';

  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('nxysnjdv3szj65ss');
  Braintree_Configuration::publicKey('r9bbdc9t54mrpqkz');
  Braintree_Configuration::privateKey('29da7b73fffa4613284308d08eeaf4ef');

	$txnId = $_POST['txn-id'];
	$amount = $_POST["amount"];
  $txnId = $_POST['txn-id'];

// API Call
$result = Braintree_Transaction::refund($txnId, $amount, $orderId);

// Result
    if ($result->success)
        echo "Success! Transaction ID " . $txnId . " was refunded.";
    else
        echo "Something went wrong.";
echo (" Refreshing...");
?>
