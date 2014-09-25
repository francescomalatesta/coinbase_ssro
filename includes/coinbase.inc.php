<?php

	require('vendor/autoload.php');

	$coinbaseAPIKey = 'MY_COINBASE_API_KEY';
	$coinbaseAPISecret = 'MY_COINBASE_API_SECRET';

	$coinbase = Coinbase::withApiKey($coinbaseAPIKey, $coinbaseAPISecret);

	if(!isset($_POST['amount']))
		header('Location: index.php');

	if (!preg_match('/^[0-9]+(?:\.[0-9]+)?$/', $_POST['amount']))
		header('Location: index.php');

	$button = $coinbase->createButton(
		"Your Donation to S.R.R.O.", 
		$_POST['amount'], 
		"BTC", 
		"", 
		array(
        	"description" => "My " . $_POST['amount'] . " BTC donation to S.S.R.O.",
        	"cancel_url" => "http://localhost/coinbase/cancel.php",
        	"success_url" => "http://localhost/coinbase/thanks.php"
    	)
    );