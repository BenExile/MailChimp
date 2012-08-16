<?php

/**
 * Example of the campaignBounceMessage() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignbouncemessage.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = ''; // Specify the campaign ID
$email = ''; // Email address to pull bounce for

// Pull bounce for $email from the campaign with ID # $id
$bounce = $statsManager->campaignBounceMessage($id, $email);

// Dump the output
var_dump($bounce);
