<?php

/**
 * Example of the apikeyExpire() API call
 * @link http://apidocs.mailchimp.com/api/1.3/apikeyexpire.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the security manager object
$securityManager = $mailchimp->getManager('Security');

$username = 'username'; // MailChimp Username
$password = 'password'; // MailChimp Password
$key = $apiKey; // API key defined in bootstrap.php

// Expire an API key for your user account
// Note that if you expire all of your keys, just visit your API dashboard to create a new one
$expire = $securityManager->apiKeyExpire($username, $password, $key);

// Dump the output (string)
var_dump($expire);
