<?php

/**
 * Example of the campaignSendTest() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignsendtest.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID
$email = 'root@localhost'; // Email to receive test message

// Test send the campaign with ID # $id to $email
$sendTest = $campaignManager->campaignSendTest($id, $email, 'text');

// Dump the output
var_dump($sendTest);
