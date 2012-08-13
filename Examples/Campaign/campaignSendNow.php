<?php

/**
 * Example of the campaignSendNow() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignsendnow.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Send the campaign with ID # $id immediately
$send = $campaignManager->campaignSendNow($id);

// Dump the output
var_dump($send);
