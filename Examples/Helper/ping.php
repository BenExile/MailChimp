<?php

/**
 * Example of the ping() API call
 * @link http://apidocs.mailchimp.com/api/1.3/ping.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Ping the MailChimp API
$ping = $helperManager->ping();

// Dump the output
var_dump($ping);
