<?php

/**
 * Example of the campaignAdvice() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignadvice.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = ''; // Specify the campaign ID

// Pull advice text for the campaign with ID # $id
$advice = $statsManager->campaignAdvice($id);

// Dump the output
var_dump($advice);
