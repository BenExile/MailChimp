<?php

/**
 * Example of the campaignEmailStatsAIMAll() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignemailstatsaimall.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the report manager object
$reportManager = $mailchimp->getManager('CampaignReportData');

$id = ''; // Specify the campaign ID

// Get stats history for campaign $id
$stats = $reportManager->campaignEmailStatsAIMAll($id);

// Dump the output
var_dump($stats);
