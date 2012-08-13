<?php

/**
 * Example of the campaignUpdate() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignupdate.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID
$name = 'title'; // Specify the parameter to update
$value = 'Hello, World'; // Specify the new value

// Get template content for the campaign with ID # $id
$update = $campaignManager->campaignUpdate($id, $name, $value);

// Dump the output
var_dump($update);
