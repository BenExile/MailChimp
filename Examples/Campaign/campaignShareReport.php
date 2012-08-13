<?php

/**
 * Example of the campaignTemplateContent() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaigntemplatecontent.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID
$email = array('root@localhost'); // Array of email addresses
$company = 'Test Company'; // Company name to display

// Share report for the campaign with ID # $id
$share = $campaignManager->campaignShareReport($id, $email, $company);

// Dump the output
var_dump($share);
