<?php

/**
 * Example of the campaignContent() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaigncontent.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$id = ''; // Specify the campaign ID

// Get content for the campaign with ID # $id
$content = $campaignManager->campaignContent($id);

// Dump the output
var_dump($content);
