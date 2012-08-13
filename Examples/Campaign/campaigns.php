<?php

/**
 * Example of the campaigns() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaigns.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

// Get the list of campaigns with default filters
$campaigns = $campaignManager->campaigns();

// Dump the output
var_dump($campaigns);
