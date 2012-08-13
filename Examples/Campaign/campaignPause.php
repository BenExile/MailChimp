<?php

/**
 * Example of the campaignPause() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignpause.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Pause the campaign with ID # $id
$pause = $campaignManager->campaignPause($id);

// Dump the output
var_dump($pause);
