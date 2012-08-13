<?php

/**
 * Example of the campaignReplicate() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignreplicate.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Replicate the campaign with ID # $id
$replicate = $campaignManager->campaignReplicate($id);

// Dump the output
var_dump($replicate);
