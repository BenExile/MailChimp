<?php

/**
 * Example of the campaignSegmentTest() API call
 * @link http://apidocs.mailchimp.com/api/1.3/campaignsegmenttest.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Create a ruleset, adding a couple of conditions
$ruleSet = new \MailChimp\Object\Segmentation\RuleSet();
$ruleSet->match($ruleSet::MATCH_ANY)->condition('date', 'lt', date('Y-m-d'));

// Retrieve the campaign manager object
$campaignManager = $mailchimp->getManager('Campaign');

$listID = ''; // The list to test segmentation on

// Test segmentation rules
$segmentTest = $campaignManager->campaignSegmentTest($listID, $ruleSet);

// Dump the output (int)
var_dump($segmentTest);
