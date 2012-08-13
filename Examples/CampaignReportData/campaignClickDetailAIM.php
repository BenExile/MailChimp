<?php

/**
 * Example of the campaignClickDetailAIM() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignclickdetailaim.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the report manager object
$reportManager = $mailchimp->getManager('CampaignReportData');

$id = ''; // Specify the campaign ID
$url = ''; // Define a URL to check

// Get email addresses that clicked on $url
$clicks = $reportManager->campaignClickDetailAIM($id, $url);

// Dump the output
var_dump($clicks);
