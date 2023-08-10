<?php

include('php/api.php');

if (isset($_POST['connect'])) {
	$amount = $_POST['amount'];
	$customerNumber = $_POST['phone'];


	// This is to ensure browser does not timeout after 30 seconds
	ini_set('max_execution_time', 300);
	set_time_limit(300);

	// Public key on the API listener used to encrypt keys
	$public_key = 'MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEArv9yxA69XQKBo24BaF/D+fvlqmGdYjqLQ5WtNBb5tquqGvAvG3WMFETVUSow/LizQalxj2ElMVrUmzu5mGGkxK08bWEXF7a1DEvtVJs6nppIlFJc2SnrU14AOrIrB28ogm58JjAl5BOQawOXD5dfSk7MaAA82pVHoIqEu0FxA8BOKU+RGTihRU+ptw1j4bsAJYiPbSX6i71gfPvwHPYamM0bfI4CmlsUUR3KvCG24rB6FNPcRBhM3jDuv8ae2kC33w9hEq8qNB55uw51vK7hyXoAa+U7IqP1y6nBdlN25gkxEA8yrsl1678cspeXr+3ciRyqoRgj9RD/ONbJhhxFvt1cLBh+qwK2eqISfBb06eRnNeC71oBokDm3zyCnkOtMDGl7IvnMfZfEPFCfg5QgJVk1msPpRvQxmEsrX9MQRyFVzgy2CWNIb7c+jPapyrNwoUbANlN8adU1m6yOuoX7F49x+OjiG2se0EJ6nafeKUXw/+hiJZvELUYgzKUtMAZVTNZfT8jjb58j8GVtuS+6TM2AutbejaCV84ZK58E2CRJqhmjQibEUO6KPdD7oTlEkFy52Y1uOOBXgYpqMzufNPmfdqqqSM4dU70PO8ogyKGiLAIxCetMjjm6FCMEA3Kc8K0Ig7/XtFm9By6VxTJK1Mg36TlHaZKP6VzVLXMtesJECAwEAAQ==';

	// Create Context with API to request a SessionKey
	$context = new APIContext();
	// Api key
	// $context->set_api_key('6bc4157dbee34d409118e0978dc6dd17');
	$context->set_api_key('xXFJtFJu74W25yKXuD6OMsQsP6nARdvN'); // sandbox api key
	// Public key
	$context->set_public_key($public_key);
	// Use ssl/https
	$context->set_ssl(true);
	// Method type (can be GET/POST/PUT)
	$context->set_method_type(APIMethodType::GET);
	// API address
	$context->set_address('openapi.m-pesa.com');
	// API Port
	$context->set_port(443);
	// API Path
	$context->set_path('/sandbox/ipg/v2/vodacomTZN/getSession/');

	// Add/update headers
	$context->add_header('Origin', '*');

	// Parameters can be added to the call as well that on POST will be in JSON format and on GET will be URL parameters
	// context->add_parameter('key', 'value');

	// Create a request object
	$request = new APIRequest($context);

	// Do the API call and put result in a response packet
	$response = null;

	try {
		$response = $request->execute();
	} catch (exception $e) {
		echo 'Call failed: ' . $e->getMessage() . '<br>';
	}

	if ($response->get_body() == null) {
		throw new Exception('SessionKey call failed to get result. Please check.');
	}

	// Display results
	echo $response->get_status_code() . '<br>';
	echo $response->get_headers() . '<br>';
	echo $response->get_body() . '<br>';

	// Decode JSON packet
	$decoded = json_decode($response->get_body());

	// The above call issued a sessionID which can be used as the API key in calls that needs the sessionID
	$context = new APIContext();
	$context->set_api_key($decoded->output_SessionID);
	$context->set_public_key($public_key);
	$context->set_ssl(true);
	$context->set_method_type(APIMethodType::POST);
	$context->set_address('openapi.m-pesa.com');
	$context->set_port(443);
	$context->set_path('/sandbox/ipg/v2/vodacomTZN/c2bPayment/singleStage/');

	$context->add_header('Origin', '*');

	$context->add_parameter('input_Amount', $amount);
	$context->add_parameter('input_Country', 'TZN');
	$context->add_parameter('input_Currency', 'TZS');
	$context->add_parameter('input_CustomerMSISDN', '255'.$customerNumber);
	$context->add_parameter('input_ServiceProviderCode', '5773467');
	$context->add_parameter('input_ThirdPartyConversationID', 'asv02e5958774f7ba228d83d0d689761');
	$context->add_parameter('input_TransactionReference', 'T1234C');
	$context->add_parameter('input_PurchasedItemsDesc', 'Shoes');

	$request = new APIRequest($context);

	// SessionID can take up to 30 seconds to become 'live' in the system and will be invalid until it is
	sleep(30);

	$response = null;

	try {
		$response = $request->execute();
	} catch (exception $e) {
		echo 'Call failed: ' . $e->getMessage() . '<br>';
	}

	if ($response->get_body() == null) {
		throw new Exception('API call failed to get result. Please check.');
	}

	echo $response->get_status_code() . '<br>';
	echo $response->get_headers() . '<br>';
	echo $response->get_body() . '<br>';
}
