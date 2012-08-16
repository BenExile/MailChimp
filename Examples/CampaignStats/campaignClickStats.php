<?php

/**
 * Example of the campaignClickStats() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignclickstats.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = ''; // Specify the campaign ID

// Pull stats for the campaign with ID # $id
$stats = $statsManager->campaignClickStats($id);

// Dump the output
var_dump($stats);
