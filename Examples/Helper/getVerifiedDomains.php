<?php

/**
 * Example of the getVerifiedDomains() API call
 * @link http://apidocs.mailchimp.com/api/1.3/getverifieddomains.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Get domains verification records for an account
$domains = $helperManager->getVerifiedDomains();

// Dump the output
var_dump($domains);
