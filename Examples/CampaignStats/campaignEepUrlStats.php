<?php

/**
 * Example of the campaignEepUrlStats() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaigneepurlstats.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = ''; // Specify the campaign ID

// Pull top 5 domains for the campaign with ID # $id
$stats = $statsManager->campaignEepUrlStats($id);

// Dump the output
var_dump($stats);
