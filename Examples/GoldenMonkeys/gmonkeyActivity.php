<?php

/**
 * Example of the gmonkeyActivity() API call
 * @link http://apidocs.mailchimp.com/api/1.3/gmonkeyactivity.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$gmonkeyManager = $mailchimp->getManager('GoldenMonkeys');

// Get all activity for Golden Monkeys over the past 10 days 
$activity = $gmonkeyManager->gmonkeyActivity();

// Dump the output
var_dump($activity);
