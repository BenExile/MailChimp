<?php

/**
 * Example of the campaignUnschedule() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignunschedule.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Unschedule the campaign with ID # $id
$unschedule = $campaignManager->campaignUnschedule($id);

// Dump the output
var_dump($unschedule);
