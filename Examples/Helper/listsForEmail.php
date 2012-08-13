<?php

/**
 * Example of the listsForEmail() API call
 * @link http://apidocs.mailchimp.com/api/1.3/listsforemail.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Get all list IDs an email address is subscribed to
$email = 'root@localhost';
$lists = $helperManager->listsForEmail($email);

// Dump the output (array)
var_dump($lists);
