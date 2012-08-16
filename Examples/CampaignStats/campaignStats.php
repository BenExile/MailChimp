<?php

/**
 * Example of the campaignStats() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignstats.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = '5dea81a67d'; // Specify the campaign ID

// Pull stats for the campaign with ID # $id
$stats = $statsManager->campaignStats($id);

// Dump the output
var_dump($stats);
