<?php

/**
 * Example of the generateText() API call
 * @link http://apidocs.mailchimp.com/api/1.3/generatetext.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Convert to a text-only format
$html = '<h1>Lorem Ipsum</h1><p>Dolor sit amet</p>';
$text = $helperManager->generateText($html);

// Dump the output (string)
var_dump($text);
