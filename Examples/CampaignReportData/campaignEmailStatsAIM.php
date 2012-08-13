<?php

/**
 * Example of the campaignEmailStatsAIM() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignemailstatsaim.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the report manager object
$reportManager = $mailchimp->getManager('CampaignReportData');

$id = ''; // Specify the campaign ID
$email = ''; // Specify an email address to check

// Get stats history for campaign $id by $email
$stats = $reportManager->campaignEmailStatsAIM($id, $email);

// Dump the output
var_dump($stats);
