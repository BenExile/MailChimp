<?php

/**
 * Example of the campaignUnsubscribes() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignunsubscribes.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = '5dea81a67d'; // Specify the campaign ID

// Pull unsubsccribes for the campaign with ID # $id
$unsubscribes = $statsManager->campaignUnsubscribes($id);

// Dump the output
var_dump($unsubscribes);
