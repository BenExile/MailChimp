<?php

/**
 * Example of the getAccountDetails() API call
 * @link http://apidocs.mailchimp.com/api/1.3/getaccountdetails.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Get MailChimp account details
$details = $helperManager->getAccountDetails();

// Dump the output
var_dump($details);
