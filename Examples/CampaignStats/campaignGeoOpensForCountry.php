<?php

/**
 * Example of the campaignGeoOpensForCountry() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignegeoopensforcountry.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the campaign stats object
$statsManager = $mailchimp->getManager('CampaignStats');

$id = ''; // Specify the campaign ID
$code = ''; // An ISO3166 2 digit country code

// Pull opens for the campaign with ID # $id in country $code
$opens = $statsManager->campaignGeoOpensForCountry($id, $code);

// Dump the output
var_dump($opens);
