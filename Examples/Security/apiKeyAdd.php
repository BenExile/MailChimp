<?php

/**
 * Example of the apikeyAdd() API call
 * @link http://apidocs.mailchimp.com/api/1.3/apikeyadd.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the security manager object
$securityManager = $mailchimp->getManager('Security');

$username = 'username'; // MailChimp Username
$password = 'password'; // MailChimp Password
$key = $apiKey; // API key defined in bootstrap.php

// Add an API key to your user account
$newAPIKey = $securityManager->apiKeyAdd($username, $password, $key);

// Dump the output (string)
var_dump($newAPIKey);
