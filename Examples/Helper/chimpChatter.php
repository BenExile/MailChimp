<?php

/**
 * Example of the chimpChatter() API call
 * @link http://apidocs.mailchimp.com/api/1.3/chimpchatter.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Get the current Chimp Chatter messages for an account
$chatter = $helperManager->chimpChatter();

// Dump the output (array)
var_dump($chatter);
