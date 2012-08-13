<?php

/**
 * Example of the campaignSchedule() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignschedule.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID
$date = date('Y-m-d H:i:s', time() + 3600); // Schedule to send in 1 hour

// Schedule the campaign with ID # $id
$schedule = $campaignManager->campaignSchedule($id, $date);

// Dump the output
var_dump($schedule);
