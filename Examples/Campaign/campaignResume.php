<?php

/**
 * Example of the campaignResume() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignresume.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Resume the campaign with ID # $id
$resume = $campaignManager->campaignResume($id);

// Dump the output
var_dump($resume);
