<?php

/**
 * Example of the campaignDelete() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaigndelete.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Delete the campaign with ID # $id
// Note: This PERMANENTLY deletes a campaign. Set up a
// dummy campaign if you wish to test this function
$delete = $campaignManager->campaignDelete($id);

// Dump the output
var_dump($delete);
