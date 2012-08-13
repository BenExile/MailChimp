<?php

/**
 * A bootstrap for the MailChimp SDK usage examples
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Don't allow direct access to the bootstrap
if(basename($_SERVER['REQUEST_URI']) == 'bootstrap.php'){
    exit('bootstrap.php does nothing on its own. Please see the examples provided');
}

// Set error reporting
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

// Register a simple autoload function
spl_autoload_register(function($class){
	$class = str_replace('\\', '/', $class);
	require_once(dirname(__FILE__) . '/../' . $class . '.php');
});

$apiKey = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-XXX';

$sslOnly = false; // If true, API calls will only be made if OpenSSL is available
$client = new \MailChimp\Client\Curl($apiKey, $sslOnly);

$mailchimp = new \MailChimp\API($client);
