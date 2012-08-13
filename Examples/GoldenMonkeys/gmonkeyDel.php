<?php

/**
 * Example of the gmonkeyDel() API call
 * @link http://apidocs.mailchimp.com/api/1.3/gmonkeydel.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$gmonkeyManager = $mailchimp->getManager('GoldenMonkeys');

$listID = 0; // List ID to connect to
$email = 'root@localhost';

// Remove a Golden Monkey
$add = $gmonkeyManager->gmonkeyDel($listID, $email);

// Dump the output
var_dump($add);
