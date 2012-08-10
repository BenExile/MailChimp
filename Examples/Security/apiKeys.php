<?php

/**
 * Example of the apikeys() API call
 * @link http://apidocs.mailchimp.com/api/1.3/apikeys.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the security manager object
$securityManager = $mailchimp->getManager('Security');

$username = 'username'; // MailChimp Username
$password = 'password'; // MailChimp Password
$key = $apiKey; // API key defined in bootstrap.php

// Get the API keys for your user account
$apiKeys = $securityManager->apiKeys($username, $password, $key);

// Dump the output
var_dump($apiKeys);
