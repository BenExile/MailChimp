<?php

/**
 * Example of the campaignsForEmail() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignsforemail.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

$email = 'root@localhost'; // Email address to query
$listID = null; // Limit to specific list

// Get the campaigns sent to this email address
$campaigns = $helperManager->campaignsForEmail($email, $listID);

// Dump the output (array)
var_dump($campaigns);
